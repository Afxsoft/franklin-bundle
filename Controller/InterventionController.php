<?php

namespace Fkl\FranklinBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Fkl\FranklinBundle\Entity\Intervention;

/**
 * Intervention controller.
 *
 */
class InterventionController extends Controller
{

    /**
     * Lists all Intervention entities.
     *
     */
    public function indexAction($page = 1)
    {
        $em = $this->getDoctrine()->getManager();
        
        $count = $em
            ->getRepository('FklFranklinBundle:Intervention')
            ->createQueryBuilder('id')
            ->select('COUNT(id)')
            ->getQuery()
            ->getSingleScalarResult()
        ;

        $pages = ceil($count / 20);
        
        $entities = $em->getRepository('FklFranklinBundle:Intervention')
        ->findBy(array(), NULL, 20, (($page - 1) * 20));

        return $this->render('FklFranklinBundle:Intervention:index.html.twig', array(
            'entities' => $entities,
            'pages' => $pages,
            'page' => $page,
        ));
    }

    /**
     * Finds and displays a Intervention entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Intervention')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Intervention entity.');
        }

        return $this->render('FklFranklinBundle:Intervention:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
