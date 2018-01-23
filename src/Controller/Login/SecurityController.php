<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 18/01/2018
 * Time: 23:25
 */

namespace App\Controller\Login;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{


    /**
     *
     * @Route("/login", name="app.security.login")
     *
     */


    public function loginAction(Request $request, AuthenticationUtils $utils){

        // get the login error if there is one
        $error = $utils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $utils->getLastUsername();

        return $this->render('login/security.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);

    }

    /**
     *
     * @Route("/accueil-admin", name="app.security.redirect")
     *
     */

    public function redirectAction(Request $request){

        $user = $this->getUser();


        if (in_array('ROLE_ADMIN', $user->getRoles())){

            return $this->render('admin/homepage.admin.html.twig');
        }


    }

    /**
     *
     * @Route("/logout", name="app.security.logout")
     *
     */

    public function logoutAction(){

    }
}