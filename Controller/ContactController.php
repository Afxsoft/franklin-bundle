<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    public function indexAction()
    {
        
        
        return $this->render('FklFranklinBundle:Contact:index.html.twig');
        
        
    }
}
