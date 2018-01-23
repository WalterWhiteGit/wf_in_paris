<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */

    private $firstname;

    /**
     *
     * @ORM\Column(type="string", length=100, nullable=false)
     *
     */

    private $lastname;


}
