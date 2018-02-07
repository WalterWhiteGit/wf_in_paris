<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="smallint")
     */
    private $id;


// Contenu commentaire
    /**
     *
     * @ORM\Column(type="string")
     *
     */

    private $content;

    /**
     *
     * @ORM\Column(type="datetime")
     *
     */

    private $create_date;


    /**
     *
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(nullable=true)
     */

    private $post;


    /**
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=true)
     */

    private $user;



}
