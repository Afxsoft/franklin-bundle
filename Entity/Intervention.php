<?php

namespace Fkl\FranklinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\Column(name="price", type="float")
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
     * @ORM\JoinTable(name="interventionsUsers")
     */
    private $users;

    /**
     * @var \Fkl\FranklinBundle\Entity\InterventionCategory
     * 
     * @ORM\ManyToOne(targetEntity="InterventionCategory")
     * @ORM\JoinColumn(name="interventioncategory", referencedColumnName="id", nullable=false)
     */
    private $category;
    
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->title;
    }


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
     * @param float $price
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
     * @return float 
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
     * Add users
     *
     * @param \Fkl\FranklinBundle\Entity\User $users
     * @return Intervention
     */
    public function addUser(\Fkl\FranklinBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Fkl\FranklinBundle\Entity\User $users
     */
    public function removeUser(\Fkl\FranklinBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set category
     *
     * @param \Fkl\FranklinBundle\Entity\InterventionCategory $category
     * @return Intervention
     */
    public function setCategory(\Fkl\FranklinBundle\Entity\InterventionCategory $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Fkl\FranklinBundle\Entity\InterventionCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
