<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Fkl\FranklinBundle\Entity\Category;
use Fkl\FranklinBundle\Form\CategoryType;

/**
 * Category controller.
 *
 */
class CategoryController extends Controller
{

    /**
     * Lists all Category entities.
     *
     */
    public function indexAction($page = 1)
    {
        $em = $this->getDoctrine()->getManager();
        
        $count = $em
            ->getRepository('FklFranklinBundle:Category')
            ->createQueryBuilder('id')
            ->select('COUNT(id)')
            ->getQuery()
            ->getSingleScalarResult()
        ;

        $pages = ceil($count / 20);
        
        $entities = $em->getRepository('FklFranklinBundle:Category')
        ->findBy(array(), NULL, 20, (($page - 1) * 20));

        return $this->render('FklFranklinBundle:Category:index.html.twig', array(
            'entities' => $entities,
            'pages' => $pages,
            'page' => $page,
        ));
    }
    /**
     * Creates a new Category entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Category();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'success', 'The Category has been created.');

            return $this->redirect($this->generateUrl('admin_category_show', array('id' => $entity->getId())));
        }

        return $this->render('FklFranklinBundle:Category:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Category entity.
    *
    * @param Category $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Category $entity)
    {
        $form = $this->createForm(new CategoryType(), $entity, array(
            'action' => $this->generateUrl('admin_category_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Category entity.
     *
     */
    public function newAction()
    {
        $entity = new Category();
        $form   = $this->createCreateForm($entity);

        return $this->render('FklFranklinBundle:Category:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Category entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        return $this->render('FklFranklinBundle:Category:show.html.twig', array(
            'entity'      => $entity,
        ));
    }

    /**
     * Displays a form to edit an existing Category entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('FklFranklinBundle:Category:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Category entity.
    *
    * @param Category $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Category $entity)
    {
        $form = $this->createForm(new CategoryType(), $entity, array(
            'action' => $this->generateUrl('admin_category_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Category entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'success', 'The Category has been updated.');
            
            return $this->redirect($this->generateUrl('admin_category_show', array('id' => $id)));
        }

        return $this->render('FklFranklinBundle:Category:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }
    /**
     * Deletes a Category entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $deleteForm = $this->createDeleteForm($id);
        $deleteForm->handleRequest($request);
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('FklFranklinBundle:Category')->find($id);

        if ($deleteForm->isValid()) {
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Category entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'success', 'The Category has been deleted.');
            
            return $this->redirect($this->generateUrl('admin_category'));
        }

        return $this->render('FklFranklinBundle:Category:delete.html.twig', array(
                'entity'      => $entity,
                'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a Category entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_category_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
