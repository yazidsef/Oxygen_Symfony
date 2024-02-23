<?php

namespace App\Form;

use App\Entity\Student;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormulaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('tel')
            ->add('degree')
            ->add('message')
            ->add('birthday', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('formation', HiddenType::class, [
                'data' => 'default_value',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
            'constraints' => [
                new UniqueEntity(fields: ['email']),
                new UniqueEntity(fields: ['tel'])
            ]
        ]);
    }
}
