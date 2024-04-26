<?php

namespace App\Form;

use App\Entity\FormContact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FormContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'row_attr' => [
                    'class' => 'form-contact__field'
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-contact__field--label'
                ],
                'attr' => [
                    'placeholder' => 'dupont',
                    'class' => 'form-contact__field--input',
                ]
            ])
            ->add('firstName', TextType::class, [
                'row_attr' => [
                    'class' => 'form-contact__field'
                ],
                'label' => 'Prénom',
                'label_attr' => [
                    'class' => 'form-contact__field--label'
                ],
                'attr' => [
                    'placeholder' => 'Nicolas',
                    'class' => 'form-contact__field--input',
                ]
            ])
            ->add('email', EmailType::class, [
                'row_attr' => [
                    'class' => 'form-contact__field'
                ],
                'label' => 'E-mail',
                'label_attr' => [
                    'class' => 'form-contact__field--label'
                ],
                'attr' => [
                    'placeholder' => 'Email',
                    'class' => 'form-contact__field--input',
                ]
            ])
            ->add('phoneNumber', TextType::class, [
                'row_attr' => [
                    'class' => 'form-contact__field'
                ],
                'label' => 'Numéro de téléphone',
                'label_attr' => [
                    'class' => 'form-contact__field--label'
                ],
                'attr' => [
                    'placeholder' => 'Numéro de téléphone',
                    'class' => 'form-contact__field--input',
                ]
            ])
            ->add('subject',TextType::class, [
                'row_attr' => [
                    'class' => 'form-contact__field'
                ],
                'label' => 'Sujet',
                'label_attr' => [
                    'class' => 'form-contact__field--label'
                ],
                'attr' => [
                    'placeholder' => 'Sujet',
                    'class' => 'form-contact__field--input',
                ]
            ])
            ->add('message',TextareaType::class, [
                'row_attr' => [
                    'class' => 'form-contact__field'
                ],
                'label' => 'Message',
                'label_attr' => [
                    'class' => 'form-contact__field--label'
                ],
                'attr' => [
                    'placeholder' => 'Entrez votre message',
                    'class' => 'form-contact__field--message-input',
                ]
            ])
            ->add('Envoyer', SubmitType::class, [
                'row_attr' => [
                    'class' => 'form-contact__button-field'
                ],
                'attr' => [
                    'class' => 'form-contact__button-field--button',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FormContact::class,
        ]);
    }
}
