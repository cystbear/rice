<?php

namespace Rice\DeckKeeperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
}
