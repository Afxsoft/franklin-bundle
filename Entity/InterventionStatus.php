<?php

namespace Fkl\FranklinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InterventionStatus
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class InterventionStatus
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    
    /**
     * @ORM\OneToMany(targetEntity="Intervention", mappedBy="$status")
     */
    protected $interventions;
    
    function __construct()
    {
        $this->interventions = new ArrayCollection();
    }
    
    
    
    public function __toString()
    {
        return $this->name;
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
     * Set name
     *
     * @param string $name
     * @return InterventionStatus
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
     * Add interventions
     *
     * @param \Fkl\FranklinBundle\Entity\Intervention $interventions
     * @return InterventionStatus
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
