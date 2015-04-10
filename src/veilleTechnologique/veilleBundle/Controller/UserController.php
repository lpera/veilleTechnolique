<?php

namespace veilleTechnologique\veilleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use veilleTechnologique\veilleBundle\Entity\User as User;
use veilleTechnologique\veilleBundle\Entity\Liste as Liste;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session as Session;

/**
 * Controller USER. Functions :
 * - Register
 * - Login
 */

class UserController extends Controller
{
    /**
     * @Route("/", name="_user_index")
     * @Template()
     */
    public function indexAction()
    {
        // Utilisé pour les tests
        $id = 1;
        $user = $this->getDoctrine()->getRepository("veilleTechnologiqueveilleBundle:User")->findOneBy(array("id" => $id));
        $listes = $this->getDoctrine()->getRepository("veilleTechnologiqueveilleBundle:Liste")->findBy(array("iduser" => $id));
        if($listes)
        {
            // L'utilisateur possède une ou plusieurs listes.
            return array("listes" => $listes, "haveListe" => true);
        }
        else
        {
            // L'utilisateur ne possède aucune liste.
            return array("haveListe" => false);
        }
    }
    
    /**
     * @Route("/logout", name="_user_logout")
     * @Template()
     */
    public function logoutAction()
    {
        $session = new Session();
        $session->remove('id');
        return $this->redirect($this->generateUrl('_default_index', array()));
    }
    
    /**
     * @Route("/createListe", name="_user_create_liste")
     * @Template()
     */
    public function createListeAction(Request $request)
    {
        $nameListe = $request->get("nameListe");
        $session = new Session();
        $user = $this->getDoctrine()->getRepository("veilleTechnologiqueveilleBundle:User")->findOneBy(array('id' => $session->get('id')));
        
        if($nameListe != "" && $nameListe != null)
        {
            $liste = new Liste();
            $liste->setName($nameListe);
            $liste->setIduser($user);
            
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($liste);
            $manager->flush();
            
            $this->get('session')->getFlashBag()->add('success','La liste '.$liste->getName().' a bien été créée !');
            
            /* Une belle documentation sur le forward, redirect & render se trouve ci-contre
             * http://openclassrooms.com/forum/sujet/symfony2-redirect-ou-render#message-85350139
             */
            $response = $this->forward('veilleTechnologiqueveilleBundle:User:index', array());
            return $response;
        }
    }
}
