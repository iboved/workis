<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResumeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('birthday', 'birthday')
            ->add('city')
            ->add('job_title')
            ->add('category', 'entity', [
                'class' => 'AppBundle:Category',
                'multiple' => false
            ])
            ->add('education', 'choice', [
                'choices' => [
                    'Higher' => 'Higher',
                    'Incomplete higher' => 'Incomplete higher',
                    'Secondary special' => 'Secondary special',
                    'Secondary' => 'Secondary']
            ])
            ->add('experience')
            ->add('employment', 'choice', [
                'choices' => [
                    'Full employment' => 'Full employment',
                    'Part-time' => 'Part-time',
                    'Distant work' => 'Distant work']
            ])
            ->add('skills')
            ->add('email', 'email')
            ->add('phone')
            ->add('save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Resume',
        ));
    }

    public function getName()
    {
        return 'resume';
    }
}
