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
            ->add('title', null, ['label' => 'job.new.title'])
            ->add('company', null, ['label' => 'job.new.company'])
            ->add('city', null, ['label' => 'job.new.city'])
            ->add('salary', null, ['label' => 'job.new.salary'])
            ->add('employment', 'choice', [
                'choices' => [
                    'Full employment' => 'job.new.full_employment',
                    'Part-time' => 'job.new.part_time',
                    'Distant work' => 'job.new.distant_work'],
                'label' => 'job.new.employment'
            ])
            ->add('education', 'choice', [
                'choices' => [
                    'Higher' => 'job.new.higher',
                    'Incomplete higher' => 'job.new.incomplete_higher',
                    'Secondary special' => 'job.new.secondary_special',
                    'Secondary' => 'job.new.secondary'],
                'label' => 'job.new.education'
            ])
            ->add('experience', null, ['label' => 'job.new.experience'])
            ->add('category', 'entity', [
                'class' => 'AppBundle:Category',
                'multiple' => false,
                'label' => 'job.new.category'
            ])
            ->add('description', null, ['label' => 'job.new.description'])
            ->add('name', null, ['label' => 'job.new.name'])
            ->add('phone', null, ['label' => 'job.new.phone'])
            ->add('save', 'submit', ['label' => 'button.save']);
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
