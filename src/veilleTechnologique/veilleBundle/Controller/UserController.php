<?php

namespace veilleTechnologique\veilleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use veilleTechnologique\veilleBundle\Entity\User as User;
use veilleTechnologique\veilleBundle\Entity\Liste as Liste;
use Symfony\Component\HttpFoundation\Request;

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
        $listes = $this->getDoctrine()->getRepository("veilleTechnologiqueveilleBundle:Liste")->findBy(array("user" => $id));
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
     * @Route("/createListe", name="_user_create_liste")
     * @Template()
     */
    public function createListeAction(Request $request)
    {
        $nameListe = $request->get("nameListe");
        $id = 1;
        
        $liste = new Liste();
        $liste->setUser();
        // $liste->set
    }
}
