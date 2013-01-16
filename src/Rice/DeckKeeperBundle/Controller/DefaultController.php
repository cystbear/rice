<?php

namespace Rice\DeckKeeperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Rice\DeckKeeperBundle\Entity\Card;
use Rice\DeckKeeperBundle\Form\CardType;
use Rice\DeckKeeperBundle\Proxy\CardProxy;

class DefaultController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        $cards = $this
            ->getDoctrine()
            ->getRepository('RiceDeckKeeperBundle:Card')
            ->findAll()
        ;

        return array(
            'cards' => $cards,
        );
    }

    /**
     * @Template()
     */
    public function cardAction($slug)
    {
        $card = $this
            ->getDoctrine()
            ->getRepository('RiceDeckKeeperBundle:Card')
            ->findOneBy(array('slug' => $slug))
        ;

        return array(
            'card' => $card,
        );
    }

    public function newAction()
    {
        $card = new Card();
        $form = $this->createForm(new CardType(), new CardProxy($card));

        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $form->getData()->evaluateUpload();
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($card);
                $em->flush();

                return $this->redirect($this->generateUrl('frontend_deck_keeper_index'));
            }
        }

        return $this->render('RiceDeckKeeperBundle:Default:new.html.twig', array(
            'form' => $form->createView()
        ));

    }
}
