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
use Symfony\Component\HttpFoundation\Request;


class HomepageController extends Controller
{

    /**
     * @Route("/homepage", name ="app.homepage")
     *
     */

    public function homePageAction(Request $request){



        $locale = $request->getLocale();
        switch ($locale) {

            case 'fr':

                $country = "par-pays";

            break;

            case 'en':
                $country = "by-country";

            break;

            case 'es':
                $country = "por-pais";

                break;
        };



        return $this->render('homepage.html.twig',['pays'=>$country]);
    }

}