<?php

namespace Fkl\FranklinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieIntervention
 */
class CategorieIntervention
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $interventions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->interventions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     * @return CategorieIntervention
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Add interventions
     *
     * @param \Fkl\FranklinBundle\Entity\Intervention $interventions
     * @return CategorieIntervention
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
}
