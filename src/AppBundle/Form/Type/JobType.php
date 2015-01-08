<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('company')
            ->add('city')
            ->add('salary')
            ->add('employment', 'choice', [
                'choices' => [
                    'full employment' => 'Full employment',
                    'part-time' => 'Part-time',
                    'distant work' => 'Distant work']
            ])
            ->add('experience')
            ->add('category', 'entity', [
                'class' => 'AppBundle:Category',
                'multiple' => false
            ])
            ->add('description')
            ->add('name')
            ->add('phone')
            ->add('save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Job',
        ));
    }

    public function getName()
    {
        return 'job';
    }
}
