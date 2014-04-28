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
}
