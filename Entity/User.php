<?php

namespace Fkl\FranklinBundle\Entity;

use FOS\UserBundle\Model\User as FOSUser;
use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Fkl\FranklinBundle\Entity\UserRepository")
 */
class User extends FOSUser
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToMany(targetEntity="Intervention", inversedBy="users")
     */
    protected $interventions;
    
    
        /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    protected $firstname;
    
     /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    protected $lastname;
    
     /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    protected $address;
    
        /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=255, nullable=true)
     */
    protected $zipcode;
    
            /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    protected $city;
    
    
                /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    protected $phone;
    
    
        /**
     * @var \Fkl\FranklinBundle\Entity\Role
     * 
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumn(name="userrole", referencedColumnName="id")
     */
    private $role;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        parent::__construct();
        $this->users = new ArrayCollection();
    }


    /**
     * Add interventions
     *
     * @param \Fkl\FranklinBundle\Entity\Intervention $interventions
     * @return User
     */
    public function addIntervention(\Fkl\FranklinBundle\Entity\Intervention $interventions)
    {
        $this->interventions[] = $interventions;

        return $this;
    }

    /**
     * Remove interventions
     *
     * @param \Fkl\FranklinBundle\Entity\Intervention $interventions
     */
    public function removeIntervention(\Fkl\FranklinBundle\Entity\Intervention $interventions)
    {
        $this->interventions->removeElement($interventions);
    }

    /**
     * Get interventions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInterventions()
    {
        return $this->interventions;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
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
     * Set zipcode
     *
     * @param  $zipcode
     * @return User
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return \int 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
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
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set role
     *
     * @param \Fkl\FranklinBundle\Entity\Role $role
     * @return User
     */
    public function setRole(\Fkl\FranklinBundle\Entity\Role $role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \Fkl\FranklinBundle\Entity\Role 
     */
    public function getRole()
    {
        return $this->role;
    }
    
        

}
