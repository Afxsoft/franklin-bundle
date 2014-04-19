<?php

namespace Fkl\FranklinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="Fkl\FranklinBundle\Entity\ProductRepository")
 */
class Product
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
     * @var string
     *
     * @ORM\Column(name="sku", type="string", length=255)
     */
    protected $sku;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    protected $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255)
     */
    protected $price;

    /**
     * @var string
     *
     * @ORM\Column(name="notice", type="text")
     */
    protected $notice;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime")
     */
    protected $updated;

    /**
     * @var \Fkl\FranklinBundle\Entity\Category
     * 
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="category", referencedColumnName="id", nullable=false)
     */
    protected $category;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="category")
     */
    protected $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
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
     * Set sku
     *
     * @param string $sku
     * @return Product
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
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Product
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Product
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
     * Set notice
     *
     * @param string $notice
     * @return Product
     */
    public function setNotice($notice)
    {
        $this->notice = $notice;

        return $this;
    }

    /**
     * Get notice
     *
     * @return string 
     */
    public function getNotice()
    {
        return $this->notice;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Product
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set category
     *
     * @param \Fkl\FranklinBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\Fkl\FranklinBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Fkl\FranklinBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add images
     *
     * @param \Fkl\FranklinBundle\Entity\Image $images
     * @return Product
     */
    public function addImage(\Fkl\FranklinBundle\Entity\Image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \Fkl\FranklinBundle\Entity\Image $images
     */
    public function removeImage(\Fkl\FranklinBundle\Entity\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }

}
