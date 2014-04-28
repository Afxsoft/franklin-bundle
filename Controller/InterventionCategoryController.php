<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Fkl\FranklinBundle\Entity\InterventionCategory;
use Fkl\FranklinBundle\Form\InterventionCategoryType;

/**
 * InterventionCategory controller.
 *
 */
class InterventionCategoryController extends Controller
{

    /**
     * Lists all InterventionCategory entities.
     *
     */
    public function indexAction($page = 1)
    {
        $em = $this->getDoctrine()->getManager();
        
        $count = $em
            ->getRepository('FklFranklinBundle:InterventionCategory')
            ->createQueryBuilder('id')
            ->select('COUNT(id)')
            ->getQuery()
            ->getSingleScalarResult()
        ;

        $pages = ceil($count / 20);
        
        $entities = $em->getRepository('FklFranklinBundle:InterventionCategory')
        ->findBy(array(), NULL, 20, (($page - 1) * 20));

        return $this->render('FklFranklinBundle:InterventionCategory:index.html.twig', array(
            'entities' => $entities,
            'pages' => $pages,
            'page' => $page,
        ));
    }
    /**
     * Creates a new InterventionCategory entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new InterventionCategory();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'success', 'The InterventionCategory has been created.');

            return $this->redirect($this->generateUrl('admin_intervention_category_show', array('id' => $entity->getId())));
        }

        return $this->render('FklFranklinBundle:InterventionCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a InterventionCategory entity.
    *
    * @param InterventionCategory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(InterventionCategory $entity)
    {
        $form = $this->createForm(new InterventionCategoryType(), $entity, array(
            'action' => $this->generateUrl('admin_intervention_category_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new InterventionCategory entity.
     *
     */
    public function newAction()
    {
        $entity = new InterventionCategory();
        $form   = $this->createCreateForm($entity);

        return $this->render('FklFranklinBundle:InterventionCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a InterventionCategory entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:InterventionCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InterventionCategory entity.');
        }

        return $this->render('FklFranklinBundle:InterventionCategory:show.html.twig', array(
            'entity'      => $entity,
        ));
    }

    /**
     * Displays a form to edit an existing InterventionCategory entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:InterventionCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InterventionCategory entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('FklFranklinBundle:InterventionCategory:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a InterventionCategory entity.
    *
    * @param InterventionCategory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(InterventionCategory $entity)
    {
        $form = $this->createForm(new InterventionCategoryType(), $entity, array(
            'action' => $this->generateUrl('admin_intervention_category_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing InterventionCategory entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:InterventionCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InterventionCategory entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'success', 'The InterventionCategory has been updated.');
            
            return $this->redirect($this->generateUrl('admin_intervention_category_show', array('id' => $id)));
        }

        return $this->render('FklFranklinBundle:InterventionCategory:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }
    /**
     * Deletes a InterventionCategory entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $deleteForm = $this->createDeleteForm($id);
        $deleteForm->handleRequest($request);
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('FklFranklinBundle:InterventionCategory')->find($id);

        if ($deleteForm->isValid()) {
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find InterventionCategory entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'success', 'The InterventionCategory has been deleted.');
            
            return $this->redirect($this->generateUrl('admin_intervention_category'));
        }

        return $this->render('FklFranklinBundle:InterventionCategory:delete.html.twig', array(
                'entity'      => $entity,
                'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a InterventionCategory entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_intervention_category_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
