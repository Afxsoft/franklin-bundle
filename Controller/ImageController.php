<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Fkl\FranklinBundle\Entity\Image;
use Fkl\FranklinBundle\Form\ImageType;

/**
 * Image controller.
 *
 */
class ImageController extends Controller
{

    /**
     * Lists all Image entities.
     *
     */
    public function indexAction($page = 1)
    {
        $em = $this->getDoctrine()->getManager();
        
        $count = $em
            ->getRepository('FklFranklinBundle:Image')
            ->createQueryBuilder('id')
            ->select('COUNT(id)')
            ->getQuery()
            ->getSingleScalarResult()
        ;

        $pages = ceil($count / 20);
        
        $entities = $em->getRepository('FklFranklinBundle:Image')
        ->findBy(array(), NULL, 20, (($page - 1) * 20));

        return $this->render('FklFranklinBundle:Image:index.html.twig', array(
            'entities' => $entities,
            'pages' => $pages,
            'page' => $page,
        ));
    }
    /**
     * Creates a new Image entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Image();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'success', 'The Image has been created.');

            return $this->redirect($this->generateUrl('admin_image_show', array('id' => $entity->getId())));
        }

        return $this->render('FklFranklinBundle:Image:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Image entity.
    *
    * @param Image $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Image $entity)
    {
        $form = $this->createForm(new ImageType(), $entity, array(
            'action' => $this->generateUrl('admin_image_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Image entity.
     *
     */
    public function newAction()
    {
        $entity = new Image();
        $form   = $this->createCreateForm($entity);

        return $this->render('FklFranklinBundle:Image:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Image entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Image')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Image entity.');
        }

        return $this->render('FklFranklinBundle:Image:show.html.twig', array(
            'entity'      => $entity,
        ));
    }

    /**
     * Displays a form to edit an existing Image entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Image')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Image entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('FklFranklinBundle:Image:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Image entity.
    *
    * @param Image $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Image $entity)
    {
        $form = $this->createForm(new ImageType(), $entity, array(
            'action' => $this->generateUrl('admin_image_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Image entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Image')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Image entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'success', 'The Image has been updated.');
            
            return $this->redirect($this->generateUrl('admin_image_show', array('id' => $id)));
        }

        return $this->render('FklFranklinBundle:Image:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }
    /**
     * Deletes a Image entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $deleteForm = $this->createDeleteForm($id);
        $deleteForm->handleRequest($request);
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('FklFranklinBundle:Image')->find($id);

        if ($deleteForm->isValid()) {
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Image entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'success', 'The Image has been deleted.');
            
            return $this->redirect($this->generateUrl('admin_image'));
        }

        return $this->render('FklFranklinBundle:Image:delete.html.twig', array(
                'entity'      => $entity,
                'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a Image entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_image_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
