<?php

namespace Fkl\FranklinBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Fkl\FranklinBundle\Entity\Product;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class ProductListener
{

    /**
     * Prepersist a creation of product with a current date
     * 
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Product) {
            $dateTime = new \DateTime();
            $entity->setUpdated($dateTime);
        }
    }

    /**
     * Prepersist an update of product with a current date
     * 
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     */
    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if ($entity instanceof Product) {
            $dateTime = new \DateTime();
            $entity->setUpdated($dateTime);
        }
    }

}
