<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 15/01/2018
 * Time: 19:12
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Translation\TranslatorInterface;


class HomepageController extends Controller
{

    /**
     * @Route("/accueil", name ="blog-homepage")
     *
     */

    public function homePageAction(TranslatorInterface $translator){


        $welcome = $translator->trans('welcome');

        return $this->render('homepage.html.twig',['welcome'=>$welcome]);
    }

}