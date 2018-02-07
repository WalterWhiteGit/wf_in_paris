<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 18/01/2018
 * Time: 16:33
 */

namespace App\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 * @Route("/admin")
 *
 */

class AdminController extends Controller
{

    /**
     *
     * @Route("/gestion-des-articles", name="post-admin-homepage")
     *
     */

    public function postAdminAction():Response{



           return $this->render('admin/posts.admin.html.twig');
    }





    /**
     *
     * @Route("/gestion-des-données", name="data-admin-action")
     *
     */

    public function dataAdminAction():Response{


        return $this->render('admin/data.admin.html.twig');

    }


    /**
     *
     *
     *
     */


}