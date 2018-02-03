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

class AdminController extends Controller
{

    /**
     *
     * @Route("/admin", name="blog-admin-homepage")
     *
     */

    public function adminAction(Request $request){



           return new Response('<p>Bonjour Admin</p>');
    }


}