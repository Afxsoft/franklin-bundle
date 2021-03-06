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
     * @ORM\Column(name="date_from", type="string", length=255)
     */
    private $date_from;
    
        /**
     * @var \DateTime
     * 
     * @ORM\Column(name="date_to", type="string", length=255)
     */
    private $date_to;

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
     * @var string
     * 
     * @ORM\Column(name="feedback", type="text")
     */
    private $feedback;
    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="interventions")
     *  @ORM\JoinTable(name="interventions_users")
     */
    private $users;

    /**
     * @var \Fkl\FranklinBundle\Entity\InterventionCategory
     * 
     * @ORM\ManyToOne(targetEntity="InterventionCategory")
     * @ORM\JoinColumn(name="interventioncategory", referencedColumnName="id", nullable=false)
     */
    private $category;
    
        /**
     * @var \Fkl\FranklinBundle\Entity\InterventionStatus
     * 
     * @ORM\ManyToOne(targetEntity="InterventionStatus")
     * @ORM\JoinColumn(name="interventionstatus", referencedColumnName="id", nullable=false)
     */
    private $status;
    
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

    /**
     * Set feedback
     *
     * @param string $feedback
     * @return Intervention
     */
    public function setFeedback($feedback)
    {
        $this->feedback = $feedback;

        return $this;
    }

    /**
     * Get feedback
     *
     * @return string 
     */
    public function getFeedback()
    {
        return $this->feedback;
    }

    /**
     * Set status
     *
     * @param \Fkl\FranklinBundle\Entity\InterventionStatus $status
     * @return Intervention
     */
    public function setStatus(\Fkl\FranklinBundle\Entity\InterventionStatus $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \Fkl\FranklinBundle\Entity\InterventionStatus 
     */
    public function getStatus()
    {
        return $this->status;
    }



    /**
     * Set date_from
     *
     * @param \DateTime $dateFrom
     * @return Intervention
     */
    public function setDateFrom($dateFrom)
    {
        $this->date_from = $dateFrom;

        return $this;
    }

    /**
     * Get date_from
     *
     * @return \DateTime 
     */
    public function getDateFrom()
    {
        return $this->date_from;
    }

    /**
     * Set date_to
     *
     * @param \DateTime $dateTo
     * @return Intervention
     */
    public function setDateTo($dateTo)
    {
        $this->date_to = $dateTo;

        return $this;
    }

    /**
     * Get date_to
     *
     * @return \DateTime 
     */
    public function getDateTo()
    {
        return $this->date_to;
    }
}
