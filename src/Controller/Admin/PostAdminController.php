<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 28/01/2018
 * Time: 01:01
 */

namespace App\Controller\Admin;


use App\Entity\Category;
use App\Entity\Post;
use App\Form\CategoryType;
use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 *
 * @Route("/admin")
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


        // Instance Doctrine
        $doctrine =$this->getDoctrine();

        $em = $doctrine->getManager() ;

        $post = new Post();
        $postEntity = PostType::class;


        //$form = $formFactory->createBuilder($postEntity,$post)->getForm();

        $form=$this->createForm($postEntity,$post);

        //exit(dump($form->getData()));

        $form->handleRequest($request);

        $createform = $form->createView();


        // Validation formulaire.

        if($form->isSubmitted() & $form->isValid()){


            //exit(dump($form->getData()->getImage()->getSize()));
            //exit(dump($image.' '.$destination));

            $data = $form->getData();

            $em->persist($data);

            //exit(dump($data));

            $em->flush();

        }


        return $this->render('admin/post.admin.html.twig',['form'=>$createform]);
    }






    /**
     *
     *@Route("/modifier-post", name="app.admin.updatepost")
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

    /**
     *
     * @Route("/category", name="app.admin.category")
     *
     */

    public function addCategoryAction(Request $request)
    {


        $doctrine = $this->getDoctrine();

        $em = $doctrine->getManager();

        $category = new Category();

        $categoryType = CategoryType::class;

        $form = $this->createForm($categoryType, $category);

        $createform = $form->createView();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $data = $form->getData();
            $add = $data->getName();

            try {

            // Récupération des données
            $em->persist($data);
            $em->flush();


            $message = "la catégorie " . $add . " a bien été ajouté dans vos catégories";
            $this->addFlash('notice', $message);
            }
/*
 Si une erreur est rencontrée :
    - Contrainte d'unicité dans la base. Pas de doublons
    - Récupérer le code de l'erreur -> ici 23000.
    - SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry ' %ma_valeur% ' for key 'name'
 */
            catch (\Doctrine\DBAL\DBALException $e){

            // Récupérer le code erreur
            $error = $e->getPrevious()->getCode();

            // Vérifier si le code correspond à notre condition.
                    if($error == "23000") {
                            $message = "la catégorie " . $add . " existe déjà dans vos catégories";
                            $this->addFlash('notice', $message);
                     }
                        else {
                            $message = "Une erreur a été rencontrée lors de l'ajout de votre donnéee";
                            $this->addFlash('notice', $message);
                        }

                }

            }

        return $this->render('admin/category.admin.html.twig', ['form' => $createform]);


    }

}