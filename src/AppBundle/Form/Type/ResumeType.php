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
            ->add('name', null, ['label' => 'resume.new.name'])
            ->add('birthday', 'birthday', ['label' => 'resume.new.birthday'])
            ->add('city', null, ['label' => 'resume.new.city'])
            ->add('job_title', null, ['label' => 'resume.new.job_title'])
            ->add('category', 'entity', [
                'class' => 'AppBundle:Category',
                'multiple' => false,
                'label' => 'resume.new.category'
            ])
            ->add('education', 'choice', [
                'choices' => [
                    'Higher' => 'resume.new.higher',
                    'Incomplete higher' => 'resume.new.incomplete_higher',
                    'Secondary special' => 'resume.new.secondary_special',
                    'Secondary' => 'resume.new.secondary'],
                'label' => 'resume.new.education'
            ])
            ->add('experience', null, ['label' => 'resume.new.experience'])
            ->add('employment', 'choice', [
                'choices' => [
                    'Full employment' => 'resume.new.full_employment',
                    'Part-time' => 'resume.new.part_time',
                    'Distant work' => 'resume.new.distant_work'],
                'label' => 'resume.new.employment'
            ])
            ->add('skills', null, ['label' => 'resume.new.skills'])
            ->add('email', 'email', ['label' => 'resume.new.email'])
            ->add('phone', null, ['label' => 'resume.new.phone'])
            ->add('save', 'submit', ['label' => 'button.save']);
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
