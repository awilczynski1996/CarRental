<?php

namespace App\Form;

use App\Entity\Rentals;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RentalsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user_id')
            ->add('car_id')
            ->add('rent_date')
            ->add('planned_return_date')
            ->add('return_date')
            ->add('date_created')
            ->add('date_updated')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rentals::class,
        ]);
    }
}
