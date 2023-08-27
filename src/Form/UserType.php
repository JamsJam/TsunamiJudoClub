<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('uuid')
            ->add('roles')
            ->add('password')
            ->add('nom')
            ->add('prenom')
            ->add('dateNaissance')
            ->add('sexe')
            ->add('adresse')
            ->add('telephone')
            ->add('urgNom')
            ->add('urgPrenom')
            ->add('urgNumero')
            ->add('certifMedical')
            ->add('licencePaid')
            ->add('coursPaid')
            ->add('email')
            ->add('ceinture')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
