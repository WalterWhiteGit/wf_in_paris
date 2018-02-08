<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 18/01/2018
 * Time: 23:25
 */

namespace App\Controller\Login;


use App\Entity\Post;
use App\Entity\User;
use App\Form\PostType;
use App\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{


    /**
     *
     * @Route("/login", name="app.security.login")
     *
     */

// Connexion Inscription.

    public function loginAction(Request $request, AuthenticationUtils $utils){

        // Récupérer Doctrine
        $doctrine = $this->getDoctrine();
        $em = $doctrine->getManager();

        // Récupérer le User.
        $user = $this->getUser();


        if($user){

            return $this->redirectToRoute('app.homepage');

        }

        // Récupérer l'erreur si la connexion échoue
        $error = $utils->getLastAuthenticationError();

        // Dernier Username saisi.
        $lastUsername = $utils->getLastUsername();



        // Créer Formulaire d'inscription.

        $user = new User();
        $userEntity = UserType::class;

        // Création du formulaire.
        $form = $this->createForm($userEntity,$user);


        $form->handleRequest($request);

        $createform = $form->createView();


        return $this->render('login/security.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
            'form'          =>$createform
        ]);


    }

// Après connexion redirection selon le profil.

    /**
     *
     * @Route("/homepage-adminblog", name="app.security.redirect")
     *
     */

    public function redirectAction(Request $request){

        $user = $this->getUser();


        if (in_array('ROLE_ADMIN', $user->getRoles())){

            return $this->render('admin/homepage.adminblog.html.twig');
        }


    }


// Déconnection avec renvoi vers la page d'accueil.
//
    /**
     *
     * @Route("/logout", name="app.security.logout")
     *
     */

    public function logoutAction(){

    }


}