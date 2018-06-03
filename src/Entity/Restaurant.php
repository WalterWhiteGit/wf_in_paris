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
     * @ORM\Column (type="string", length=100, nullable=false)
     *
     */

    private $adress;


    /**
     *
     * @ORM\Column (type="string", nullable=false)
     */

    private $codezip;


    /**
     *
     * @ORM\Column (type="string",length= 50, nullable=false)
     *
     */

    private $city;



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

    private $website;


    /**
     *
     * @ORM\Column(type="string")
     *
     */

    private $access;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param mixed $adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    /**
     * @return mixed
     */
    public function getCodezip()
    {
        return $this->codezip;
    }

    /**
     * @param mixed $codezip
     */
    public function setCodezip($codezip)
    {
        $this->codezip = $codezip;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param mixed $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * @return mixed
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * @param mixed $access
     */
    public function setAccess($access)
    {
        $this->access = $access;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param mixed $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
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
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     *
     * @ORM\ManyToOne(targetEntity="District")
     * @ORM\JoinColumn(nullable=true)
     */

    private $district;


    /**
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(nullable=true)
     */

    private $category;

}
