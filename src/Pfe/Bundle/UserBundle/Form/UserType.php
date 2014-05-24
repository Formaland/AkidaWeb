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

            ->add('cin', 'text')
            ->add('username')
            ->add('firstName')
            ->add('lastName')
            ->add('adresse')
            ->add('phone')
            ->add('email', 'repeated', array(
                'type' => 'email',
                'invalid_message' => 'L\'email doivent correspondre',
                'options' => array('required' => true),
                'first_options'  => array('label' => 'Email'),
                'second_options' => array('label' => 'Email (validation)'),
            ))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Les mots de passe doivent correspondre',
                'options' => array('required' => true),
                'first_options'  => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Mot de passe (validation)'),
            ))
            ->add('dateofbirth','birthday')
            ->add('description')


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
