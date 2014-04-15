<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InstallationController extends Controller
{
    public function indexAction()
    {
        return $this->render('FklFranklinBundle:Installation:index.html.twig');
    }
}
