<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommandeController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $request = $this->getRequest();

        $filter = '';
        $status = '';
        $percent = 0;
        if ($request->getMethod() == 'POST') {
            $filter = $request->request->get('sku');
            $command = $em->getRepository('FklFranklinBundle:Command')
                    ->findOneBy(array('sku' => $filter));
            if ($command != null) {
                $status = 'Votre commande est : ' . $command->getStatus();
                $percent = $command->getStatus()->getId();
            } else {
                $status = "La référence n'existe pas";
            }
        }


        return $this->render('FklFranklinBundle:Commande:index.html.twig', array(
                    'status' => $status,
                    'percent' => $percent
        ));
    }

}
