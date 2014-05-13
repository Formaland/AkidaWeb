<?php

namespace Pfe\Bundle\HoralTestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OraltestType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameoraltest')
            ->add('hezb')
            ->add('weeklysession')
            ->add('student')
            ->add('teacher')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pfe\Bundle\HoralTestBundle\Entity\Oraltest'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pfe_bundle_horaltestbundle_oraltest';
    }
}
