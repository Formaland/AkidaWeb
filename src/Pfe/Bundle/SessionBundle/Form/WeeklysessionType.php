<?php

namespace Pfe\Bundle\SessionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WeeklysessionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('day')
            ->add('starttime')
            ->add('endtime')
            //->add('student')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pfe\Bundle\SessionBundle\Entity\Weeklysession'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pfe_bundle_sessionbundle_weeklysession';
    }
}
