<?php

namespace Pfe\Bundle\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('cin')
            ->add('username')
            ->add('firstName')
            ->add('lastName')

            ->add('adresse')
            ->add('phone')
            ->add('email','email')
            ->add('password','password')
            ->add('dateofbirth','birthday')
            ->add('enabled')
            ->add('description')
            ->add('roles')


           # ->add('student')
          # ->add('teacher')



        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pfe\Bundle\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pfe_bundle_userbundle_user';
    }
}
