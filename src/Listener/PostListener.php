<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 19/02/2018
 * Time: 11:22
 */

namespace App\Listener;

use App\Entity\Post;
use App\Service\FileService;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;


class PostListener
{

    private $fileservice;


    public function __construct(FileService $fileService )
    {

        $this->fileservice = $fileService;
    }


    public function prePersist(Post $post, LifecycleEventArgs $event)
    {
        $name;
        $directory;

        //Traitement de l'image

        // Récupérer le nom de l'image inséré dans le formulaire.
        $image = $post->getImage();

        // Date du jour de l'insertion.
        $date = date('Ymd');

        // Récupérer le nom du pay.
        $substr= $post->getCategory()->getCountry();

        // Extraire les 3 premiers caractères.
        $name= substr( $substr,0,3);

        // Image renomméé.
        $filename = $name.$date;


        // Déplacer l'image dans son dossier respectif selon le pays.

        switch ($name){

            case "Vie" :
                        $directory = "img/post/vietnam";
            break;

            case "Chi" :
                        $directory = "img/post/chine";
            break;

            case "Tha" :
                        $directory = "img/post/thailande";
            break;

            case "Jap" :
                        $directory = "img/post/japon";
            break;

        }


        // Traitement de l'image via le fileservice
        $this->fileservice->upLoad($image,$filename,$directory);

        //Renommer l'image en base.
        $post->setImage($this->fileservice->getName());

    }

}