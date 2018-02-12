<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 11/02/2018
 * Time: 11:05
 */

namespace App\Controller\User;


use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

  /**
   *
   * @Route("/mon-profil", name="app.user.profil")
   *
   */


  public function userProfilAction(Request $request){


      $userId = $this->getUser()->getId();


      $repository = $this->getDoctrine()->getRepository(User::class);

      $profil = $repository->findByUser($userId);





      return $this->render('user/user.profil.html.twig',['profil'=>$profil]);

  }


}