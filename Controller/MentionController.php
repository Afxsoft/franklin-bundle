<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MentionController extends Controller
{
    public function indexAction()
    {
        return $this->render('FklFranklinBundle:Mention:index.html.twig');
    }
}
