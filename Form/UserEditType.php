<?php

namespace Fkl\FranklinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserEditType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('username')
                ->add('email')
                ->add('firstname')
                ->add('lastname')
                ->add('address')
                ->add('zipcode')
                ->add('city')
                ->add('phone')
                ->add('enabled', null, array('label' => 'Actif '))
                ->add('role')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Fkl\FranklinBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'fkl_franklinbundle_user';
    }

}
