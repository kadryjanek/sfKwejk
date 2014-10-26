<?php

namespace Kwejk\MemsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddMemType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('imageFile', 'file')
            ->add('save', 'submit', array(
                'label'     => 'Zapisz'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kwejk\MemsBundle\Entity\Mem'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kwejk_memsbundle_add_mem';
    }
}
