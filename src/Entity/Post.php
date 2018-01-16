<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
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
     * @ORM\Column(type="datetime")
     */

    private $updated;

    /**
     * @ORM\Column(type="smallint", length=3)
     */

    private $Author_id;


    /**
     *
     * @ORM\Column(type="smallint", length=3)
     */

    private $Category_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

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

    /**
     * @param mixed $Created
     */
    public function setCreated($Created)
    {
        $this->Created = $Created;
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
    public function setUpdated()
    {
        $this->updated->modify("now");
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->Author_id;
    }

    /**
     * @param mixed $Author_id
     */
    public function setAuthorId($Author_id)
    {
        $this->Author_id = $Author_id;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->Category_id;
    }

    /**
     * @param mixed $Category_id
     */
    public function setCategoryId($Category_id)
    {
        $this->Category_id = $Category_id;
    }


}
