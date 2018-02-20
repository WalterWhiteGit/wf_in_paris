<?php
/**
 * Created by PhpStorm.
 * User: samy
 * Date: 18/02/2018
 * Time: 22:17
 */

namespace App\Service;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileService
{
    private $name;


    /*
     *
     * Nomme l'image avec une clé token
     * Après nommage, modification en BDD.
     *
     */
    public function upLoad(UploadedFile $file, string $filename, string $directory)
    {
        $token = $this->tokenName(16);

        $this->name="$filename"."$token.{$file->guessExtension()}";

        $file -> move($directory,$this->name);

    }


    public function getName():string{

        return $this->name;
    }


    /*
     *
     * Générer une clé token
     *
     */

    public function tokenName(int $length){


        $value = bin2hex(random_bytes($length/2));

        return $value;
    }

}