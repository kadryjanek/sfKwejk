<?php

namespace Kwejk\MemsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MemType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('createdAt')
            ->add('title')
            ->add('slug')
            ->add('imageName')
            ->add('isAccepted')
            ->add('createdBy')
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
        return 'kwejk_memsbundle_mem';
    }
}
