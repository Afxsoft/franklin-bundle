<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fkl\FranklinBundle\Entity\Installation;
use Fkl\FranklinBundle\Form\InstallationType;

/**
 * Installation controller.
 *
 * @Route("/admin/installations")
 */
class InstallationController extends Controller
{

    /**
     * Lists all Installation entities.
     *
     * @Route("/list/{page}", name="admin_installations", requirements={"page" = "\d+"}, defaults={"page" = 1})
     * @Route("/", name="admin_installations_root", defaults={"page" = 1})
     * @Method("GET")
     * @Template()
     */
    public function indexAction($page = 1)
    {
        $em = $this->getDoctrine()->getManager();
        
        $count = $em
            ->getRepository('FklFranklinBundle:Installation')
            ->createQueryBuilder('id')
            ->select('COUNT(id)')
            ->getQuery()
            ->getSingleScalarResult()
        ;

        $pages = ceil($count / 20);
        
        $entities = $em->getRepository('FklFranklinBundle:Installation')
        ->findBy(array(), NULL, 20, (($page - 1) * 20));

        return array(
            'entities' => $entities,
            'pages' => $pages,
            'page' => $page,
        );
    }
    /**
     * Creates a new Installation entity.
     *
     * @Route("/", name="admin_installations_create")
     * @Method("POST")
     * @Template("FklFranklinBundle:Installation:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Installation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'success', 'The Installation has been created.');

            return $this->redirect($this->generateUrl('admin_installations_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Installation entity.
    *
    * @param Installation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Installation $entity)
    {
        $form = $this->createForm(new InstallationType(), $entity, array(
            'action' => $this->generateUrl('admin_installations_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Installation entity.
     *
     * @Route("/new", name="admin_installations_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Installation();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Installation entity.
     *
     * @Route("/{id}", name="admin_installations_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Installation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Installation entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

    /**
     * Displays a form to edit an existing Installation entity.
     *
     * @Route("/{id}/edit", name="admin_installations_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Installation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Installation entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Installation entity.
    *
    * @param Installation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Installation $entity)
    {
        $form = $this->createForm(new InstallationType(), $entity, array(
            'action' => $this->generateUrl('admin_installations_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Installation entity.
     *
     * @Route("/{id}", name="admin_installations_update")
     * @Method("PUT")
     * @Template("FklFranklinBundle:Installation:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Installation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Installation entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'success', 'The Installation has been updated.');
            
            return $this->redirect($this->generateUrl('admin_installations_show', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a Installation entity.
     *
     * @Route("/{id}", name="admin_installations_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $deleteForm = $this->createDeleteForm($id);
        $deleteForm->handleRequest($request);
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('FklFranklinBundle:Installation')->find($id);

        if ($deleteForm->isValid()) {
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Installation entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add(
                'success', 'The Installation has been deleted.');
            
            return $this->redirect($this->generateUrl('admin_installations'));
        }

        return $this->render('FklFranklinBundle:Installation:delete.html.twig', array(
                'entity'      => $entity,
                'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a Installation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_installations_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
