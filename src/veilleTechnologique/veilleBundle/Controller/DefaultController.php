<?php

namespace veilleTechnologique\veilleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
   
    
    /**
     * @Route("/home", name="_home_hello")
     * @Template()
     */
    public function indexAction()
    {
        return array('nom' => 'toto');
    }
}
