<?php

namespace App\Form;

use App\Entity\HomePage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class HomePageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'row_attr' => [
                    'class' => 'home-page-form__field'
                ],
                'label' => 'Titre de la page',
                'label_attr' => [
                    'class' => 'home-page-form__field--label'
                ],
                'attr' => [
                    'class' => 'home-page-form__field--input',
                ]
            ])
            ->add('presentationText', TextareaType::class, [
                'row_attr' => [
                    'class' => 'home-page-form__field'
                ],
                'label' => 'Texte de présentation',
                'label_attr' => [
                    'class' => 'home-page-form__field--label'
                ],
                'attr' => [
                    'class' => 'home-page-form__field--input',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HomePage::class,
        ]);
    }
}
