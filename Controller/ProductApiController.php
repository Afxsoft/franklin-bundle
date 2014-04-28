<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Fkl\FranklinBundle\Entity\Product;
use Fkl\FranklinBundle\Form\ProductType;
use Fkl\FranklinBundle\Entity\Image;
use Fkl\FranklinBundle\Form\ImageType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Product controller.
 *
 */
class ProductApiController extends Controller
{

    /**
     * Lists all Product entities.
     *
     */
    public function indexAction($page = 1)
    {
        $em = $this->getDoctrine()->getManager();

        $count = $em
            ->getRepository('FklFranklinBundle:Product')
            ->createQueryBuilder('id')
            ->select('COUNT(id)')
            ->getQuery()
            ->getSingleScalarResult()
        ;

        $pages = ceil($count / 20);

        $entities = $em->getRepository('FklFranklinBundle:Product')
            ->findBy(array(), NULL, 20, (($page - 1) * 20));

        $json = array();
        
        foreach ($entities as $entity) {
            $entity instanceof Product;
            $json[$entity->getId()] = array(
                'name'        => $entity->getName(),
                'description' => $entity->getDescription(),
            );
        }

        $response = new Response();
        $response->setContent(json_encode($json));
        return $response;
    }

    /**
     * Finds and displays a Product entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Product')->find($id);

        if (!$entity) {
            $response = new Response();
            $response->setStatusCode(404);
            $response->setContent(json_encode(array('error' => 'product not found')));
        }

        $json = array(
            'Id'          => $entity->getId(),
            'name'        => $entity->getName(),
            'description' => $entity->getDescription(),
        );

        $response = new Response();
        $response->setContent(json_encode($json));
        return $response;
    }

}
