<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 15/01/2018
 * Time: 19:12
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomepageController extends Controller
{

    public function indexAction(){



        return $this->render('homepage.html.twig');
    }

}