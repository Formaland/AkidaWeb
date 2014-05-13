<?php
/**
 * Created by PhpStorm.
 * User: imen
 * Date: 11/05/14
 * Time: 00:19
 */
namespace Pfe\Bundle\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class UserRechercheForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('motcle', 'text', array('label' => 'Mot-clé'));
    }

    public function getName()
    {
        return 'userrecherche';
    }
}