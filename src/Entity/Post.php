<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 * @ORM\EntityListeners({"App\Listener\PostListener"})
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="smallint")
     */
    private $id;

 
    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */

    private $Title;


    /**
     * @ORM\Column(type="string",length=200, nullable=false)
     */

    private $Image;

    /**
     * @ORM\Column(type="text", nullable=false)
     */

    private $Content;


    /**
     * @ORM\Column(type="datetime")
     */

    private $Created;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     */

    private $updated;



/*
 * Mapping relations
*/

    /**
     *
     * @ORM\ManyToOne(targetEntity="District")
     * @ORM\JoinColumn(nullable=true)
     */

    private $district;


    /**
     *
     * @return mixed
     *
     */


    public function getDistrict(){

        return $this->district;
    }

    /**
     *
     * @param mixed $district
     *
     */

    public function setDistrict($district)
    {

        $this->district=$district;

    }

    /**
    *
    * @ORM\ManyToOne(targetEntity="Author")
    * @ORM\JoinColumn(nullable=true)
    */

    private $author;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Restaurant")
     * @ORM\JoinColumn(nullable=true)
     */

    private $restaurant;


    /**
     * @ORM\OneToOne(targetEntity="Restaurant")
     */


    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }


    /**
     * @return mixed
     */
    public function getRestaurant(){
        return -$this->restaurant;
    }

    /**
     * @param mixed $restaurant
     */

    public function setRestaurant($restaurant){

        $this->restaurant = $restaurant;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     *
     */

    public function setCategory( $category)
    {
        $this->category = $category;
    }


    /**
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(nullable=true)
     */

    private $category;




    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * @param mixed $Title
     */
    public function setTitle($Title)
    {
        $this->Title = $Title;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->Image;
    }

    /**
     * @param mixed $Image
     */
    public function setImage($Image)
    {
        $this->Image = $Image;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->Content;
    }

    /**
     * @param mixed $Content
     */
    public function setContent($Content)
    {
        $this->Content = $Content;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->Created;
    }


    public function __construct()
    {
        $this->Created = new \DateTime();
    }


    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }


    /**
     * @param mixed $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }


}
