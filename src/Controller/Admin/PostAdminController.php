<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 28/01/2018
 * Time: 01:01
 */

namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 *
 * @Route("/admin)
 *
 */

class PostAdminController extends Controller
{
    /**
     *
     * @Route("/ajouter-post", name ="app.admin.addpost")
     *
     */

    public function addPostAction(Request $request){



    }

    /**
     *
     *@Route("/modifier-post, name="app.admin.updatepost")
     *
     */

    public function updatePostAction(Request $request){



    }

    /**
     *
     *@Route("/supprimer-post", name="app.admin.deletepost")
     *
     */

    public function deletePostAction(Request $request){



    }

}