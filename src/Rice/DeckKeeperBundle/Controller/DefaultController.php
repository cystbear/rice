<?php

namespace Rice\DeckKeeperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
}
