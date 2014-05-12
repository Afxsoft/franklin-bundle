<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommandeController extends Controller
{
    public function indexAction()
    {
        return $this->render('FklFranklinBundle:Commande:index.html.twig');
    }
}
