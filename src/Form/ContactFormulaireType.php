<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class ContactFormulaireType extends AbstractType
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
            ->add('phone', TelType::class, [
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
            'data_class' => Contact::class,
        ]);
    }
}
