<?php

namespace Pfe\Bundle\SessionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClassroomType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameclassroom')
            ->add('capacity')
            ->add('weeklysession')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pfe\Bundle\SessionBundle\Entity\Classroom'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pfe_bundle_sessionbundle_classroom';
    }
}
