<?php

namespace App\Form;

use App\Entity\Opinion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class OpinionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'row_attr' => [
                    'class' => 'opinion-form__field'
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'opinion-form__field--label'
                ],
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => 'opinion-form__field--input',
                ],
            ])
            ->add('avis', TextareaType::class, [
                'row_attr' => [
                    'class' => 'opinion-form__field'
                ],
                'label' => 'Commentaire',
                'label_attr' => [
                    'class' => 'opinion-form__field--label'
                ],
                'attr' => [
                    'placeholder' => 'Entrez votre Avis',
                    'class' => 'opinion-form__field--input',
                ]
            ])
            ->add('score', IntegerType::class, [
                'row_attr' => [
                    'class' => 'opinion-form__field'
                ],
                'label' => 'Note',
                'label_attr' => [
                    'class' => 'opinion-form__field--label'
                ],
                'attr' => [
                    'placeholder' => 'Score entre 1 et 5',
                    'class' => 'opinion-form__field--input',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Opinion::class,
        ]);
    }
}
