<?php

// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Fkl\FranklinBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProduitAdmin extends Admin {

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('categorie')
                ->add('ref', 'text', array('label' => 'Référence'))
                ->add('nom', 'text', array('label' => 'Nom'))
                ->add('quantite', 'text', array('label' => 'Quantité'))
                ->add('tarif', 'text', array('label' => 'Tarif'))
                ->add('notice', 'text', array('label' => 'Notice'))
                ->add('description', 'textarea', array('attr' => array('class' => 'ckeditor')))
->add('images', 'sonata_type_model', array('multiple' => true));

    }


    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('ref')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('id')
                ->add('ref')
                ->add('nom')
                ->add('tarif')
                ->add('quantite')
                ->add('description')

        ;
    }

}
