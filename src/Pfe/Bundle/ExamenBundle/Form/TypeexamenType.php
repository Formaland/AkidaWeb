<?php

namespace Pfe\Bundle\ExamenBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TypeexamenType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nametypeexamen')
            ->add('description')
            ->add('examen')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pfe\Bundle\ExamenBundle\Entity\Typeexamen'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pfe_bundle_examenbundle_typeexamen';
    }
}
