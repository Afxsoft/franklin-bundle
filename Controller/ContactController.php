<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller {

    public function indexAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $email = $request->request->get('email');
            $name = $request->request->get('name');
            $subject = $request->request->get('subject');
            $message = $request->request->get('message');


            $message = \Swift_Message::newInstance()
                    ->setSubject('Hello Email')
                    ->setFrom($request->request->get('email'))
                    ->setTo('arnaud.wbc@gmail.com')
                    ->setBody($this->renderView('FklFranklinBundle:Contact:email.html.twig', array('email' => $email,'name' => $name,'subject' => $subject,'message' => $message )));

            $this->get('mailer')->send($message);
        }

        return $this->render('FklFranklinBundle:Contact:index.html.twig');
    }

}
