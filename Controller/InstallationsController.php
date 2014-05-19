<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InstallationsController extends Controller
{
    public function indexAction()
    {
        
                $em = $this->getDoctrine()->getManager();
        $installations = $em->getRepository('FklFranklinBundle:Installation')->findAll();
        
        
        
        return $this->render('FklFranklinBundle:Installations:index.html.twig', array('installations' => $installations));
    }
}
