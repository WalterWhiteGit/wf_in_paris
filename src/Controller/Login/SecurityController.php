<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 18/01/2018
 * Time: 23:25
 */

namespace App\Controller\Login;


use App\Entity\Post;
use App\Form\PostType;
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


    public function loginAction(Request $request, AuthenticationUtils $utils){

        $user = $this->getUser();


        if($user){

            return $this->redirectToRoute('app.homepage');

        }

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
     * @Route("/homepage-admin", name="app.security.redirect")
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