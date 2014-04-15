<?php

namespace Fkl\FranklinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 */
class Produit {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ref;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var integer
     */
    private $quantite;

    /**
     * @var string
     */
    private $tarif;

    /**
     * @var string
     */
    private $notice;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $image;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \Fkl\FranklinBundle\Entity\Categorie
     */
    private $categorie;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set ref
     *
     * @param string $ref
     * @return Produit
     */
    public function setRef($ref) {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string 
     */
    public function getRef() {
        return $this->ref;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Produit
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return Produit
     */
    public function setQuantite($quantite) {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite() {
        return $this->quantite;
    }

    /**
     * Set tarif
     *
     * @param string $tarif
     * @return Produit
     */
    public function setTarif($tarif) {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return string 
     */
    public function getTarif() {
        return $this->tarif;
    }

    /**
     * Set notice
     *
     * @param string $notice
     * @return Produit
     */
    public function setNotice($notice) {
        $this->notice = $notice;

        return $this;
    }

    /**
     * Get notice
     *
     * @return string 
     */
    public function getNotice() {
        return $this->notice;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Produit
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }


    /**
     * Set categorie
     *
     * @param \Fkl\FranklinBundle\Entity\Categorie $categorie
     * @return Produit
     */
    public function setCategorie(\Fkl\FranklinBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Fkl\FranklinBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @var string
     */
    private $lifecycleCallbacks;


    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Produit
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
     * @var string
     */
    private $filename;


    /**
     * Set filename
     *
     * @param string $filename
     * @return Produit
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $images;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add images
     *
     * @param \Fkl\FranklinBundle\Entity\Image $images
     * @return Produit
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
