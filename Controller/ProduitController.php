<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitController extends Controller
{
    public function indexAction()
    {
        return $this->render('FklFranklinBundle:Produit:index.html.twig');
    }
}
