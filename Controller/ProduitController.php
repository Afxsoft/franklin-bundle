<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitController extends Controller
{
    public function indexAction()
    {

        
       $em = $this->getDoctrine()->getManager();
       $products = $em->getRepository('FklFranklinBundle:Product')->findAll();
       $categories = $em->getRepository('FklFranklinBundle:Category')->findAll();
       
           $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $products = $em->getRepository('FklFranklinBundle:Product')->findByCategory($request->request->get('categorie'));

            }
       
        return $this->render('FklFranklinBundle:Produit:index.html.twig', array('products' =>$products, 'categories' => $categories));
    }
    public function fullAction()
    {
           $request = $this->getRequest();
               $em = $this->getDoctrine()->getManager();
                      $product = $em->getRepository('FklFranklinBundle:Product')->findOneById($request->query->get('id'));
        return $this->render('FklFranklinBundle:Produit:full.html.twig', array('product'=>$product));
    }
}
