<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 18/01/2018
 * Time: 23:25
 */

namespace App\Controller\Login;


use App\Entity\User;
use App\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
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

/*

        // Créer Formulaire d'inscription.

        $user = new User();
        $userEntity = UserType::class;

        // Création du formulaire.
        $form = $this->createForm($userEntity,$user);

        $createform = $form->createView();

        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                 exit(dump($form->getData()));
            }
*/
        return $this->render('login/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
            //'accountform'   =>$createform
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

        else{

            return $this->render('homepage.html.twig');

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


    /**
     *
     * @Route("/account", name="app.security.account")
     *
     */

    public function createAccountAction(Request $request, UserPasswordEncoderInterface $passwordEncoder){

        // Créer Formulaire d'inscription.

        $doctrine = $this->getDoctrine();

        $em = $doctrine->getManager();

        $user = new User();
        $userEntity = UserType::class;

        // Création du formulaire.
        $form = $this->createForm($userEntity,$user);

        $form->handleRequest($request);

        $createform = $form->createView();


        if ($form->isSubmitted() && $form->isValid()) {


            $data=$form->getData();
            $username=$data->getUsername();



            try{

                $em->persist($data);
                $em->flush();

                $message= "Bienvenue ".$username.", votre compte est vien créé.";
                $this->addFlash('notice',$message);

            }

            catch (\Doctrine\DBAL\DBALException $e){


                    exit(dump($e));

            }


        }

        return $this->render('account/create.account.html.twig', [
            'accountform'   =>$createform
        ]);


    }



}