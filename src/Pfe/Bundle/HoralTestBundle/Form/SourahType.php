<?php

namespace Pfe\Bundle\HoralTestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SourahType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('namesourah')
            ->add('numsourah')
            ->add('hezb')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pfe\Bundle\HoralTestBundle\Entity\Sourah'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pfe_bundle_horaltestbundle_sourah';
    }
}
