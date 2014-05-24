<?php

namespace Pfe\Bundle\CoursesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CoursesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('namecourses')
            ->add('typecourse')
            ->add('durationcourses')
            ->add('groups')
            ->add('weeklysession')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pfe\Bundle\CoursesBundle\Entity\Courses'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pfe_bundle_coursesbundle_courses';
    }
}
