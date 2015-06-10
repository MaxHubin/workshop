<?php

namespace Workshop\Bundle\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add(
                'isEmptyImg',
                'checkbox',
                array(
                    'label' => 'is empty image',
                    'required' => false,
                )
            )
            ->add('file');
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Workshop\Bundle\ProductBundle\Entity\Product',
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'workshop_bundle_productbundle_product';
    }
}
