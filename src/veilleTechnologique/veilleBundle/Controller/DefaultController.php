<?php

namespace veilleTechnologique\veilleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use veilleTechnologique\veilleBundle\Entity\User as User;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
   
    
    /**
     * @Route("/", name="_home_hello")
     * @Template()
     */
    public function indexAction()
    {
        /*$userSet = new User();
        
        $userSet->setLogin('ludo');
        $userSet->setPass('popo');
        $userSet->setEmail('ludo@popo.fr');
        */
        
        $user=$this->getDoctrine()->getRepository("veilleTechnologiqueveilleBundle:User")->findOneBy(array('id' => '1'));
        
        /*
        $em = $this->getDoctrine()->getManager();
        $em->persist($userSet);
        $em->flush();
      */
        
        
        
        return array();
    }
    
    /**
     * @Route("/inscription", name="_home_inscription")
     * @Template()
     */
    public function inscriptionAction(Request $request)
    {
        $user = new User();
        $form = $this->get('form.factory')->createBuilder('form', $user)
                ->add('login','text')
                ->add('pass','password')
                ->add('email','text')
                ->add('valide','submit')
                ->getForm()
        ;
        
        $form->handleRequest($request);
        
        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Vos changements ont été sauvegardés!');
            
            //return $this->render('veilleTechnologiqueveilleBundle::layout.html.twig',array());
            return $this->redirect($this->generateUrl('_home_hello', array()));
            
        }
        
        
        return array('form' => $form->createView());
    }
}
