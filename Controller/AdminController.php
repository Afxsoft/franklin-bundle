<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('FklFranklinBundle:Admin:index.html.twig');
    }
}
