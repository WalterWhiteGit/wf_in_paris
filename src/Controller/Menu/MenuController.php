<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 19/01/2018
 * Time: 20:38
 */

namespace App\Controller\Menu;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends Controller
{

    /**
     *
     * @Route("/asian-food/pays", name="app.menu.country")
     */


    public function countryAction():Response {

        $vtn = "/img/menu/c-vietnam.jpg";
        $thd = "/img/menu/c-thailandia.jpg";
        $jpn = "/img/menu/c-japan.jpg";
        $chn = "/img/menu/c-china.jpg";

        $countryimg = [$vtn,$thd,$jpn,$chn];
        $country = ['vietnam','Thailande','Japon','Chine'];

        $countries=[$countryimg,$country];

        return $this->render('menu/menu.country.html.twig',['countries'=>$countryimg,'pays'=>$country]);

    }
}