<?php

namespace Fkl\FranklinBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fkl\FranklinBundle\Entity\InterventionCategory;

/**
 * InterventionCategory controller.
 *
 * @Route("/interventioncategory")
 */
class InterventionCategoryController extends Controller
{

    /**
     * Lists all InterventionCategory entities.
     *
     * @Route("/list/{page}", name="interventioncategory", requirements={"page" = "\d+"}, defaults={"page" = 1})
     * @Route("/", name="interventioncategory_root", defaults={"page" = 1})
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page = 1)
    {
        $em = $this->getDoctrine()->getManager();
        
        $count = $em
            ->getRepository('FklFranklinBundle:InterventionCategory')
            ->createQueryBuilder('id')
            ->select('COUNT(id)')
            ->getQuery()
            ->getSingleScalarResult()
        ;

        $pages = ceil($count / 20);
        
        $entities = $em->getRepository('FklFranklinBundle:InterventionCategory')
        ->findBy(array(), NULL, 20, (($page - 1) * 20));

        return array(
            'entities' => $entities,
            'pages' => $pages,
            'page' => $page,
        );
    }

    /**
     * Finds and displays a InterventionCategory entity.
     *
     * @Route("/{id}", name="interventioncategory_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:InterventionCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InterventionCategory entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
}
