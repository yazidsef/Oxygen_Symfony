<?php

namespace App\Form;

use App\Entity\Application;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Range;

class FormulaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter un prénom valide !',
                    ]),
                ]
            ])
            ->add('lastName', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter un nom valide !',
                    ]),
                ]
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter un email valide !',
                    ]),
                ]
            ])
            ->add('tel', TelType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez un numéro de téléphone valide !',
                    ]),
                    new Regex([
                        'pattern' => '/^\d{10}$/',
                        'message' => 'Le numéro de téléphone doit avoir exactement 10 chiffres.',
                    ]),
                ],
            ])
            ->add('degree', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter un diplôme valide !',
                    ]),
                ]
            ])
            ->add('age', IntegerType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter un âge valide !',
                    ]),
                    new Regex([
                        'pattern' => '/^(1[8-9]|[2-5][0-9]|60)$/', // Regex pattern to match ages 18 to 60
                        'message' => 'L\'âge doit être compris entre 18 et 60 ans.',
                    ]),
                    new Range([
                        'min' => 18,
                        'max' => 60,
                        'minMessage' => 'L\'âge doit être d\'au moins {{ limit }} ans.',
                        'maxMessage' => 'L\'âge doit être d\'au plus {{ limit }} ans.',
                    ]),
                ]
            ])
            ->add('message', TextareaType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez ajouter un message valide !',
                    ]),
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Application::class,
            'course_id' => null,
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'format' => 'dd/MM/yyyy',
        ]);
    }
}
