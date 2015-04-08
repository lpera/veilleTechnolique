<?php

namespace veilleTechnologique\veilleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use veilleTechnologique\veilleBundle\Entity\User as User;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller ANONYMOUS. Functions :
 * - Register
 * - Login
 */

class DefaultController extends Controller
{
    /**
     * @Route("/", name="_default_hello")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/register", name="_default_inscription")
     * @Template()
     */
    public function inscriptionAction(Request $request)
    {
        // Création d'un objet utilisateur.
        $user = new User();
        
        // Création du formulaire.
        $form = $this->get('form.factory')->createBuilder('form', $user)
                ->add('login','text')
                ->add('pass','password')
                ->add('email','text')
                ->add('valide','submit')
                ->getForm();
        
        // Réception des données du formulaire.
        $form->handleRequest($request);
        
        if($form->isValid())
        {
            // On persiste l'utilisateur dans la base de donnée.
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            // Envois un message flash à l'utilisateur.
            $this->get('session')->getFlashBag()->add('success','Vous vous êtes bien enregistré(e) sur l\'application, '.$user->getLogin().' !');

            // On redirige l'utilisateur sur l'accueil.
            return $this->redirect($this->generateUrl('_default_hello', array()));
        }
        // TODO : Condition ELSE à faire : renvoyer un message d'erreur pour dire que c'est invalide.
        
        // On l'envoit sur l'inscription.
        return array('form' => $form->createView());
    }
}
