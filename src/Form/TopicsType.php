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

class TopicsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('latinName')
            ->add('description')
            ->add('imageName')
            ->add('watering', EntityType::class, [
                'class' => Watering::class,
'choice_label' => 'id',
            ])
            ->add('exposition', EntityType::class, [
                'class' => Exposition::class,
'choice_label' => 'id',
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
'choice_label' => 'id',
            ])
            ->add('exposure', EntityType::class, [
                'class' => Exposure::class,
'choice_label' => 'id',
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
