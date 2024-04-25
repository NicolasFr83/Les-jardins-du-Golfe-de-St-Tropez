<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Exposition;
use App\Entity\Exposure;
use App\Entity\Topics;
use App\Entity\Watering;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class TopicsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'row_attr' => [
                    'class' => 'topic-form__field'
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'topic-form__field--label'
                ],
                'attr' => [
                    'placeholder' => 'dupont',
                    'class' => 'topic-form__field--input',
                ]
            ])
            ->add('latinName', TextType::class, [
                'row_attr' => [
                    'class' => 'topic-form__field'
                ],
                'label' => 'Nom latin',
                'label_attr' => [
                    'class' => 'topic-form__field--label'
                ],
                'attr' => [
                    'placeholder' => 'dupont',
                    'class' => 'topic-form__field--input',
                ]
            ])
            ->add('description', TextareaType::class, [
                'row_attr' => [
                    'class' => 'topic-form__field'
                ],
                'label' => 'Message',
                'label_attr' => [
                    'class' => 'topic-form__field--label'
                ],
                'attr' => [
                    'placeholder' => 'Entrez votre message',
                    'class' => 'topic-form__field--message-input',
                ]
            ])
            ->add('imageFile', VichImageType::class, [
                'row_attr' => [
                    'class' => 'topic-form__field'
                ],
                'label' => 'Image du sujet',
                'label_attr' => [
                    'class' => 'topic-form__field--label'
                ],
                'attr' => [
                    'class' => 'topic-form__field--input',
                ],
                'required' => false,
            ])
            ->add('imageName', TextType::class, [
                'row_attr' => [
                    'class' => 'topic-form__field'
                ],
                'label' => 'Nom de l\'image du sujet',
                'label_attr' => [
                    'class' => 'topic-form__field--label'
                ],
                'attr' => [
                    'class' => 'topic-form__field--input',
                ]
            ])
            ->add('watering', EntityType::class, [
                'class' => Watering::class,
                'row_attr' => [
                    'class' => 'topic-form__field'
                ],
                'label' => 'Arrosage',
                'label_attr' => [
                    'class' => 'topic-form__field--label'
                ],
                'attr' => [
                    'class' => 'topic-form__field--input',
                ]
            ])
            ->add('exposition', EntityType::class, [
                'class' => Exposition::class,
                'row_attr' => [
                    'class' => 'topic-form__field'
                ],
                'label' => 'Exposition',
                'label_attr' => [
                    'class' => 'topic-form__field--label'
                ],
                'attr' => [
                    'class' => 'topic-form__field--input',
                ]
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'row_attr' => [
                    'class' => 'topic-form__field'
                ],
                'label' => 'Catégorie',
                'label_attr' => [
                    'class' => 'topic-form__field--label'
                ],
                'attr' => [
                    'class' => 'topic-form__field--input',
                ]
            ])
            ->add('exposure', EntityType::class, [
                'class' => Exposure::class,
                'row_attr' => [
                    'class' => 'topic-form__field'
                ],
                'label' => 'Lieu de la plantation',
                'label_attr' => [
                    'class' => 'topic-form__field--label'
                ],
                'attr' => [
                    'class' => 'topic-form__field--input',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Topics::class,
        ]);
    }
}
