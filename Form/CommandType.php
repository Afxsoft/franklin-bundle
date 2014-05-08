<?php

namespace Fkl\FranklinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommandType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('sku')
                ->add('date', 'datetime', array('date_widget' => 'single_text'))
                ->add('infos')
                ->add('status')
                ->add('products');




        
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Fkl\FranklinBundle\Entity\Command'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'fkl_franklinbundle_command';
    }

}
