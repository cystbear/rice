<?php

namespace Rice\DeckKeeperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Rice\DeckKeeperBundle\Entity\CardSet;
use Rice\DeckKeeperBundle\Form\CardSetType;

class CardSetController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        $sets = $this
            ->getDoctrine()
            ->getRepository('RiceDeckKeeperBundle:CardSet')
            ->findAll()
        ;

        return array(
            'sets' => $sets,
        );
    }

    public function newAction()
    {
        $cardSet = new CardSet();
        $form = $this->createForm(new CardSetType(), $cardSet);

        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($cardSet);
                $em->flush();

                return $this->redirect($this->generateUrl('frontend_deck_keeper_cardset_index'));
            }
        }

        return $this->render('RiceDeckKeeperBundle:CardSet:new.html.twig', array(
            'form' => $form->createView()
        ));

    }

}
