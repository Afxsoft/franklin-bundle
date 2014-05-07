<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Fkl\FranklinBundle\Entity\Intervention;
use Fkl\FranklinBundle\Form\InterventionType;

/**
 * Intervention controller.
 *
 */
class InterventionController extends Controller
{

    /**
     * Lists all Intervention entities.
     *
     */
    public function indexAction($page = 1)
    {
        $role_id= $this->getUser()->getRole()->getId();
        
        $em = $this->getDoctrine()->getManager();
        $count = $em
            ->getRepository('FklFranklinBundle:Intervention')
            ->createQueryBuilder('id')
            ->select('COUNT(id)')
            ->getQuery()
            ->getSingleScalarResult()
        ;

        $pages = ceil($count / 20);
        
        if( $role_id != 4 ){            
        $entities = $this->getUser()->getInterventions();
        }
        else{
        $entities = $em->getRepository('FklFranklinBundle:Intervention')
        ->findBy(array(), NULL, 20, (($page - 1) * 20));
        }
        return $this->render('FklFranklinBundle:Intervention:index.html.twig', array(
            'entities' => $entities,
            'pages' => $pages,
            'page' => $page,
        ));
    }
    /**
     * Creates a new Intervention entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Intervention();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'success', 'The Intervention has been created.');

            return $this->redirect($this->generateUrl('admin_intervention_show', array('id' => $entity->getId())));
        }

        return $this->render('FklFranklinBundle:Intervention:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Intervention entity.
    *
    * @param Intervention $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Intervention $entity)
    {
        $form = $this->createForm(new InterventionType(), $entity, array(
            'action' => $this->generateUrl('admin_intervention_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Intervention entity.
     *
     */
    public function newAction()
    {
        $entity = new Intervention();
        $form   = $this->createCreateForm($entity);

        return $this->render('FklFranklinBundle:Intervention:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Intervention entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Intervention')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Intervention entity.');
        }

        return $this->render('FklFranklinBundle:Intervention:show.html.twig', array(
            'entity'      => $entity,
        ));
    }

    /**
     * Displays a form to edit an existing Intervention entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Intervention')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Intervention entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('FklFranklinBundle:Intervention:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Intervention entity.
    *
    * @param Intervention $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Intervention $entity)
    {
        $form = $this->createForm(new InterventionType(), $entity, array(
            'action' => $this->generateUrl('admin_intervention_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Intervention entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Intervention')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Intervention entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'success', 'The Intervention has been updated.');
            
            return $this->redirect($this->generateUrl('admin_intervention_show', array('id' => $id)));
        }

        return $this->render('FklFranklinBundle:Intervention:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }
    /**
     * Deletes a Intervention entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $deleteForm = $this->createDeleteForm($id);
        $deleteForm->handleRequest($request);
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('FklFranklinBundle:Intervention')->find($id);

        if ($deleteForm->isValid()) {
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Intervention entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'success', 'The Intervention has been deleted.');
            
            return $this->redirect($this->generateUrl('admin_intervention'));
        }

        return $this->render('FklFranklinBundle:Intervention:delete.html.twig', array(
                'entity'      => $entity,
                'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a Intervention entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_intervention_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
