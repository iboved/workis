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
                    'Full employment' => 'Full employment',
                    'Part-time' => 'Part-time',
                    'Distant work' => 'Distant work']
            ])
            ->add('education', 'choice', [
                'choices' => [
                    'Higher' => 'Higher',
                    'Incomplete higher' => 'Incomplete higher',
                    'Secondary special' => 'Secondary special',
                    'Secondary' => 'Secondary']
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
