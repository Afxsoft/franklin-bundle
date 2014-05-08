<?php

namespace Fkl\FranklinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

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
->add('users', 'entity', array(
    'class' => 'FklFranklinBundle:User',
    'query_builder' => function(EntityRepository $er) {
        return $er->createQueryBuilder('u')
            ->where('u.role < :int')->setParameter('int', 3);
    },
            'multiple' => true
))          ->add('category')
                            ->add('status')

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
