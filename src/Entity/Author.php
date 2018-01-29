<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
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
     * @ORM\Column(type="text")
     *
     */

    private $description;


    /**
     *
     * @ORM\Column(type="string", length=50)
     *
     */

    private $photo;

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }


/*
 * Mapping
 */

    /**
     *
     * @ORM\OneToMany(targetEntity="src\Entity\Post", mappedBy="author")
     *
     */

    private $post;

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }


}
