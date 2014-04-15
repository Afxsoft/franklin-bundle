<?php

namespace Fkl\FranklinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InterventionProduit
 */
class InterventionProduit
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Fkl\FranklinBundle\Entity\Produit
     */
    private $produit;


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
     * Set produit
     *
     * @param \Fkl\FranklinBundle\Entity\Produit $produit
     * @return InterventionProduit
     */
    public function setProduit(\Fkl\FranklinBundle\Entity\Produit $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \Fkl\FranklinBundle\Entity\Produit 
     */
    public function getProduit()
    {
        return $this->produit;
    }
    /**
     * @var \Fkl\FranklinBundle\Entity\Intervention
     */
    private $intervention;


    /**
     * Set intervention
     *
     * @param \Fkl\FranklinBundle\Entity\Intervention $intervention
     * @return InterventionProduit
     */
    public function setIntervention(\Fkl\FranklinBundle\Entity\Intervention $intervention = null)
    {
        $this->intervention = $intervention;

        return $this;
    }

    /**
     * Get intervention
     *
     * @return \Fkl\FranklinBundle\Entity\Intervention 
     */
    public function getIntervention()
    {
        return $this->intervention;
    }
}
