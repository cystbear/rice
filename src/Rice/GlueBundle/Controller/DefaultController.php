<?php

namespace Rice\GlueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $customer = $this
            ->getDoctrine()
            ->getRepository('RiceGlueBundle:Customer')
            ->findOneBy(array())
        ;

        $dream = $this
            ->getDoctrine()
            ->getRepository('RiceGlueBundle:Dream')
            ->findOneBy(array())
        ;

        return $this->render('RiceGlueBundle:Default:index.html.twig', array(
            'customer' => $customer,
            'dream' => $dream,
        ));
    }
}
