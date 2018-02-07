<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="smallint")
     */
    private $id;


    /**
     *
     * @ORM\Column(type="string", length=50)
     *
     */

    private $firstname;


    /**
     *
     * @ORM\Column(type="string", length=50)
     *
     */

    private $lastname;


    /**
     *
     * @ORM\Column(type="string")
     *
     */

    private $sexe;



    /**
     *
     * @ORM\Column(type="string", length=50)
     *
     */

    private $nickname;



}
