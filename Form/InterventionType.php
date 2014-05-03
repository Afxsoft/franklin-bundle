<?php

namespace Fkl\FranklinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InterventionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
                ->add('date', 'datetime', array( 'date_widget' => 'single_text'))
            ->add('price')
            ->add('address')
            ->add('zip')
            ->add('city')
            ->add('users')
            ->add('category')
            ->add('feedback')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fkl\FranklinBundle\Entity\Intervention'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fkl_franklinbundle_intervention';
    }
}
