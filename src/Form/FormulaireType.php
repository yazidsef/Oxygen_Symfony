<?php

namespace App\Form;

use App\Entity\Application;
use App\Entity\Student;
use App\Entity\StudentReview;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class FormulaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class)
            ->add('lastName')
            ->add('tel')
            ->add('degree')
            ->add('birthday')
            ->add('address')
            ->add('avatarImage')
            ->add('formation')
            ->add('studentReview', EntityType::class, [
                'class' => StudentReview::class,
'choice_label' => 'id',
            ])
            ->add('applications', EntityType::class, [
                'class' => Application::class,
'choice_label' => 'id',
'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
