<?php

namespace Fkl\FranklinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Intervention
 * 
 * @ORM\Table(name="intervention")
 * @ORM\Entity(repositoryClass="Fkl\FranklinBundle\Entity\InterventionRepository")
 */
class Intervention
{
    /**
     * @var integer
     *  
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     * 
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price;

    /**
     * @var string
     * 
     * @ORM\Column(name="address", type="text")
     */
    private $address;

    /**
     * @var integer
     * 
     * @ORM\Column(name="zip", type="integer")
     */
    private $zip;

    /**
     * @var string
     * 
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var \Fkl\FranklinBundle\Entity\User
     * 
     * @ORM\ManyToMany(targetEntity="User")
     * @ORM\JoinColumn(name="user", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @var \Fkl\FranklinBundle\Entity\InterventionCategory
     * 
     * @ORM\ManyToOne(targetEntity="InterventionCategory")
     * @ORM\JoinColumn(name="interventioncategory", referencedColumnName="id", nullable=false)
     */
    private $interventionCategory;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Intervention
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Intervention
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Intervention
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Intervention
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zip
     *
     * @param integer $zip
     * @return Intervention
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return integer 
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Intervention
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return Intervention
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set interventionCategory
     *
     * @param integer $interventionCategory
     * @return Intervention
     */
    public function setInterventionCategory($interventionCategory)
    {
        $this->interventionCategory = $interventionCategory;

        return $this;
    }

    /**
     * Get interventionCategory
     *
     * @return integer 
     */
    public function getInterventionCategory()
    {
        return $this->interventionCategory;
    }
}
