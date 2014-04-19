<?php

namespace Fkl\FranklinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Fkl\FranklinBundle\Entity\Product;
use Fkl\FranklinBundle\Form\ProductType;
use Fkl\FranklinBundle\Entity\Image;
use Fkl\FranklinBundle\Form\ImageType;

/**
 * Product controller.
 *
 */
class ProductController extends Controller
{

    /**
     * Lists all Product entities.
     *
     */
    public function indexAction($page = 1)
    {
        $em = $this->getDoctrine()->getManager();

        $count = $em
            ->getRepository('FklFranklinBundle:Product')
            ->createQueryBuilder('id')
            ->select('COUNT(id)')
            ->getQuery()
            ->getSingleScalarResult()
        ;

        $pages = ceil($count / 20);

        $entities = $em->getRepository('FklFranklinBundle:Product')
            ->findBy(array(), NULL, 20, (($page - 1) * 20));

        return $this->render('FklFranklinBundle:Product:index.html.twig', array(
                'entities' => $entities,
                'pages'    => $pages,
                'page'     => $page,
        ));
    }

    /**
     * Creates a new Product entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Product();
        $form   = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success', 'The Product has been created.');

            return $this->redirect($this->generateUrl('admin_product_show', array('id' => $entity->getId())));
        }

        return $this->render('FklFranklinBundle:Product:new.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Product entity.
     *
     * @param Product $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Product $entity)
    {
        $form = $this->createForm(new ProductType(), $entity, array(
            'action' => $this->generateUrl('admin_product_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Product entity.
     *
     */
    public function newAction()
    {
        $entity = new Product();
        $form   = $this->createCreateForm($entity);

        return $this->render('FklFranklinBundle:Product:new.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Product entity.
     *
     */
    public function showAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $image        = new Image();
        $image->setProduct($entity);
        $formNewImage = $this->createImageForm($image);

        if ($request->isMethod('POST')) {

            $formNewImage->handleRequest($request);

            if ($formNewImage->isValid()) {
                $data = $formNewImage['file']->getData();
                
                list($width, $height, $type, $attr) = getimagesize($data->getPathname());
                
                $extensions = array(
                    'image/png' => 'png',
                    'image/jpeg' => 'jpg',
                    'image/gif' => 'gif',
                );
                
                $image->setMimetype($data->getMimeType());
                $image->setSize($data->getClientSize());
                $image->setHeight($height);
                $image->setWidth($width);
                
                $em->persist($image);
                $em->flush();
                $directory = 'uploads/products-images/' . $entity->getId();
                $this->get('filesystem')->mkdir($directory);
                $name = $image->getId() . '.' . $extensions[$data->getMimeType()];
                $newFile = $data->move($directory, $name);
                $image->setPath($newFile->getPathName());
                $em->persist($image);
                $em->flush();


                return $this->redirect($this->generateUrl('admin_product_show', array('id' => $id)));
            }
        }

        return $this->render('FklFranklinBundle:Product:show.html.twig', array(
                'entity'       => $entity,
                'formNewImage' => $formNewImage->createView(),
                'images' => $entity->getImages(),
        ));
    }

    /**
     * Creates a form to create a Image entity.
     *
     * @param Image $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createImageForm(Image $entity)
    {
        $form = $this->createForm(new ImageType(), $entity, array(
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to edit an existing Product entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('FklFranklinBundle:Product:edit.html.twig', array(
                'entity'    => $entity,
                'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Product entity.
     *
     * @param Product $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Product $entity)
    {
        $form = $this->createForm(new ProductType(), $entity, array(
            'action' => $this->generateUrl('admin_product_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Product entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FklFranklinBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success', 'The Product has been updated.');

            return $this->redirect($this->generateUrl('admin_product_show', array('id' => $id)));
        }

        return $this->render('FklFranklinBundle:Product:edit.html.twig', array(
                'entity'    => $entity,
                'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a Product entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $deleteForm = $this->createDeleteForm($id);
        $deleteForm->handleRequest($request);

        $em     = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('FklFranklinBundle:Product')->find($id);

        if ($deleteForm->isValid()) {
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }

            $em->remove($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success', 'The Product has been deleted.');

            return $this->redirect($this->generateUrl('admin_product'));
        }

        return $this->render('FklFranklinBundle:Product:delete.html.twig', array(
                'entity'      => $entity,
                'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a Product entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
                ->setAction($this->generateUrl('admin_product_delete', array('id' => $id)))
                ->setMethod('DELETE')
                ->add('submit', 'submit', array('label' => 'Delete'))
                ->getForm()
        ;
    }

}
