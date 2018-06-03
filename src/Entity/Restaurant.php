<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RestaurantRepository")
 */
class Restaurant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields


    /**
     *
     * @ORM\Column(type="string", length=100, nullable=false)
     *
     *
     */

    private $name;


    /**
     *
     * @ORM\Column (type="string", nullable=false)
     *
     */

    private $adress;


    /**
     *
     * @ORM\Column (type="string", length=10)
     */

    private $phone;


    /**
     *
     * @ORM\Column(type="string")
     *
     */

    private $email;


    /**
     *
     * @ORM\Column(type="string")
     *
     */


    private $access;
}
