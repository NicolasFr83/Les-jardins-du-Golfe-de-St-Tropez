<?php

namespace App\Form;

use App\Entity\Enterprise;
use App\Entity\Opening;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OpeningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('openingDay')
            ->add('openingHourMorning')
            ->add('closingHourMorning')
            ->add('openingHourAfternoon')
            ->add('closingHourAfternoon')
            ->add('enterprise', EntityType::class, [
                'class' => Enterprise::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Opening::class,
        ]);
    }
}
