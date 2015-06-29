<?php

namespace Workshop\Bundle\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class RegistrationFormType
 * @package Workshop\Bundle\UserBundle\Form\Type
 */
class RegistrationFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // add your custom field
        $builder->add('oxagileSalary');
        $builder->add('pastProject1');
        $builder->add('pastProject2');
        $builder->add('pastProject3');
        $builder->remove('username');
        $builder->remove('plainPassword');
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return 'fos_user_registration';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'workshop_user_registration';
    }
}