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
    
    /**
     * @Route("/interface", name="_default_interface")
     * @Template()
     */
    public function interfaceAction(Request $request)
    {
        function getSymfony2($color)
        {
            $url = 'http://symfony.com/blog/category/releases';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Veille Technologique (https://github.com/lpera/veilleTechnologique)');
            $resultat = curl_exec($ch);
            curl_close($ch);

            $pattern  = '<h1 class="content_title">';
            $resultat = strstr($resultat, $pattern);

            $pattern2 = '</div>';
            $index = strpos($resultat, $pattern2);

            $resultat = substr($resultat, 0, $index);

            $resultat = str_replace("<a ", "<a target='_blank' ", $resultat);
            $resultat = preg_replace('#href="#', 'href="http://symfony.com', $resultat);
            $resultat = preg_replace('#http://symfony.comhttp#', 'http', $resultat);
            $resultat = preg_replace('#<a #', '<a style="color:'.$color.'"', $resultat);

            return "<div id='symfony2'>".$resultat."</div>";
        }

        function getNodeJS($color)
        {
            $url = 'http://blog.nodejs.org/';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Veille Technologique (https://github.com/lpera/veilleTechnologique)');
            $resultat = curl_exec($ch);
            curl_close($ch);

            $pattern  = '<div class="post-in-feed">';
            $resultat = strstr($resultat, $pattern);

            $pattern2 = '</div>';
            $index = strpos($resultat, $pattern2);

            $resultat = substr($resultat, 0, $index);

            $resultat = str_replace("<a ", "<a target='_blank' ", $resultat);
            $resultat = preg_replace('#href="#', 'href="http://blog.nodejs.org', $resultat);
            $resultat = preg_replace('#http://blog.nodejs.orghttp#', 'http', $resultat);
            $resultat = preg_replace('#<a #', '<a style="color:'.$color.'"', $resultat);

            return "<div id='nodejs'>".$resultat."</div></div>";
        }

        function getPHP($color)
        {
            $url = 'http://php.net/';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Veille Technologique (https://github.com/lpera/veilleTechnologique)');
            $resultat = curl_exec($ch);
            curl_close($ch);

            $pattern  = '<article class="newsentry">';
            $resultat = strstr($resultat, $pattern);

            $pattern2 = '</article>';
            $index = strpos($resultat, $pattern2);

            $resultat = substr($resultat, 0, $index);

            $resultat = str_replace("<a ", "<a target='_blank' ", $resultat);
            $resultat = preg_replace('#href="#', 'href="http://php.net', $resultat);
            $resultat = preg_replace('#http://php.nethttp#', 'http', $resultat);
            $resultat = preg_replace('#<a #', '<a style="color:'.$color.'"', $resultat);

            return "<div id='php'>".$resultat."</div>";
        }

        function getSpring($color)
        {
            $url = 'http://spring.io/blog/category/releases';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Veille Technologique (https://github.com/lpera/veilleTechnologique)');
            $resultat = curl_exec($ch);
            curl_close($ch);

            $pattern  = '<article class="blog--container blog-preview">';
            $resultat = strstr($resultat, $pattern);

            $pattern2 = '</article>';
            $index = strpos($resultat, $pattern2);

            $resultat = substr($resultat, 0, $index);

            $resultat = str_replace("<a ", "<a target='_blank' ", $resultat);
            $resultat = preg_replace('#href="#', 'href="http://spring.io/blog/category/releases', $resultat);
            $resultat = preg_replace('#http://spring.io/blog/category/releaseshttp#', 'http', $resultat);
            $resultat = preg_replace('#<a #', '<a style="color:'.$color.'"', $resultat);

            return "<div id='spring'>".$resultat."</div>";
        }

        function getBootstrap($color)
        {
            $url = 'http://blog.getbootstrap.com/';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Veille Technologique (https://github.com/lpera/veilleTechnologique)');
            $resultat = curl_exec($ch);
            curl_close($ch);

            $pattern  = '<div class="post">';
            $resultat = strstr($resultat, $pattern);

            $resultat = substr($resultat, strlen($pattern), strlen($resultat));

            $pattern2 = '<div class="post">';
            $index = strpos($resultat, $pattern2);

            $resultat = substr($resultat, 0, $index);

            $resultat = str_replace("<a ", "<a target='_blank' ", $resultat);
            $resultat = preg_replace('#href="#', 'href="http://blog.getbootstrap.com', $resultat);
            $resultat = preg_replace('#http://blog.getbootstrap.comhttp#', 'http', $resultat);
            $resultat = preg_replace('#<a #', '<a style="color:'.$color.'"', $resultat);
            
            $resultat = substr($resultat, 0, (strlen($resultat)-12));

            return "<div id='bootstrap'>".$resultat."</div>";
        }
        
        $ext = array();
        
        $ext['PHP'] = getPHP('darkblue');
        $ext['Spring'] = getSpring('orange');
        $ext['Bootstrap'] = getBootstrap('purple');
        $ext['NodeJS'] = getNodeJS('lightgreen');
        $ext['Symfony2'] = getSymfony2('green');
        
        return array('ext' => $ext);
    }
}
