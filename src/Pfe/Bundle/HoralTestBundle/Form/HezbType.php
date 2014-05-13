<?php

namespace Pfe\Bundle\HoralTestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HezbType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numhezb')
            ->add('sourah')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pfe\Bundle\HoralTestBundle\Entity\Hezb'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pfe_bundle_horaltestbundle_hezb';
    }
}
