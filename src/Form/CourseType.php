<?php

namespace App\Form;

use App\Entity\Course;
use App\Entity\Discipline;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\NotBlank;

class CourseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('discipline', EntityType::class, [
                'class' => Discipline::class,
                'choice_label' => 'name',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter une discipline valide !',
                    ]),
                ],
            ])
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter un titre valide !',
                    ]),
                ]
            ])
            ->add('location', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter un lieu valide !',
                    ]),
                ]
            ])
            ->add('capacity', IntegerType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter une capacité valide !',
                    ]),
                ]
            ])
            ->add('description', TextareaType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter une description valide !',
                    ]),
                ]
            ])
            ->add('duration', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter une durée valide !',
                    ]),
                ]
            ])
            ->add('date', DateType::class,[
                'widget' => 'single_text',
            ], [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter une date valide !',
                    ]),
                ]
            ])
            ->add('degree', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter un degré valide !',
                    ]),
                ]
            ])
            ->add('financingSupport', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter un support de financement valide !',
                    ]),
                ]
            ])
            ->add('urlImage', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter une image valide !',
                    ]),
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Course::class,
            'disciplines' => [],
        ]);
    }
}
