<?php

namespace App\Form;

use App\Entity\Tips;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TipsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'row_attr' => [
                    'class' => 'tip-form__field'
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'tip-form__field--label'
                ],
                'attr' => [
                    'placeholder' => 'dupont',
                    'class' => 'tip-form__field--input',
                ]
            ])
            ->add('planting', TextareaType::class, [
                'row_attr' => [
                    'class' => 'tip-form__field'
                ],
                'label' => 'Message',
                'label_attr' => [
                    'class' => 'tip-form__field--label'
                ],
                'attr' => [
                    'placeholder' => 'Entrez votre message',
                    'class' => 'tip-form__field--message-input',
                ]
            ])
            ->add('maintenance', TextareaType::class, [
                'row_attr' => [
                    'class' => 'tip-form__field'
                ],
                'label' => 'Message',
                'label_attr' => [
                    'class' => 'tip-form__field--label'
                ],
                'attr' => [
                    'placeholder' => 'Entrez votre message',
                    'class' => 'tip-form__field--message-input',
                ]
            ])
            ->add('imageFile', VichImageType::class, [
                'row_attr' => [
                    'class' => 'tip-form__field'
                ],
                'label' => 'Image du sujet',
                'label_attr' => [
                    'class' => 'tip-form__field--label'
                ],
                'attr' => [
                    'class' => 'tip-form__field--input',
                ],
                'required' => false,
            ])
            ->add('imageName', TextType::class, [
                'row_attr' => [
                    'class' => 'tip-form__field'
                ],
                'label' => 'Nom de l\'image du sujet',
                'label_attr' => [
                    'class' => 'tip-form__field--label'
                ],
                'attr' => [
                    'class' => 'tip-form__field--input',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tips::class,
        ]);
    }
}
