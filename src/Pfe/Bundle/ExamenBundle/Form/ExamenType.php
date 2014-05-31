<?php

namespace Pfe\Bundle\ExamenBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExamenType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameexamen')
            ->add('dateexamen')
            ->add('starttime')
            ->add('endtime')
            ->add('description')
            ->add('students')
            ->add('typeexamens')
            ->add('courses')
            ->add('commissions')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pfe\Bundle\ExamenBundle\Entity\Examen'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pfe_bundle_examenbundle_examen';
    }
}
