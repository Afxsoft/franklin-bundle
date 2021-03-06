<?php

namespace Fkl\FranklinBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

//Ne pas oubliter ce ``use`` !
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Command
 *
 * @ORM\Table()
 * @ORM\Entity
 * 
 * @UniqueEntity("sku")
 */
class Command
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
     * @ORM\Column(name="sku", type="string", length=255, unique=true)
     */
    private $sku;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="string", length=255)
     */
    private $date;

        /**
     * @var string
     *
     * @ORM\Column(name="infos", type="text")
     */
    private $infos;
    /**
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="commands")
     * @ORM\JoinTable(name="products_commands")
     **/
    private $products;
    
            /**
     * @var \Fkl\FranklinBundle\Entity\CommandStatus
     * 
     * @ORM\ManyToOne(targetEntity="CommandStatus")
     * @ORM\JoinColumn(name="status", referencedColumnName="id")
     */
    private $status;
    
    
        /**
     * @var \Fkl\FranklinBundle\Entity\User
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="commands")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;
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
     * Set sku
     *
     * @param string $sku
     * @return Command
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get sku
     *
     * @return string 
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Command
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
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add products
     *
     * @param \Fkl\FranklinBundle\Entity\Product $products
     * @return Command
     */
    public function addProduct(\Fkl\FranklinBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Fkl\FranklinBundle\Entity\Product $products
     */
    public function removeProduct(\Fkl\FranklinBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set infos
     *
     * @param string $infos
     * @return Command
     */
    public function setInfos($infos)
    {
        $this->infos = $infos;

        return $this;
    }

    /**
     * Get infos
     *
     * @return string 
     */
    public function getInfos()
    {
        return $this->infos;
    }

    /**
     * Set status
     *
     * @param \Fkl\FranklinBundle\Entity\CommandStatus $status
     * @return Command
     */
    public function setStatus(\Fkl\FranklinBundle\Entity\CommandStatus $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \Fkl\FranklinBundle\Entity\CommandStatus 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set user
     *
     * @param \Fkl\FranklinBundle\Entity\User $user
     * @return Command
     */
    public function setUser(\Fkl\FranklinBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Fkl\FranklinBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
