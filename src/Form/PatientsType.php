<?php

namespace App\Form;

use App\Entity\Patients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, ['label' => 'Nom', 
            'label_attr' =>['class' => 'form-label'],
            'attr' =>['class' => 'form-control'],
            ])
            ->add('firstname', TextType::class, ['label' => 'Prénom',
            'label_attr' =>['class' => 'form-label'],
            'attr' =>['class' => 'form-control'],])
            ->add('birthDate', BirthdayType::class, ['label' => 'Date de naissance',
            'label_attr' =>['class' => 'form-label'],
            'placeholder' => [
                'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
            ],
            ])
            ->add('email', TextType::class, ['label' => 'Adresse email',
            'label_attr' =>['class' => 'form-label'],
            'attr' =>['class' => 'form-control'],])
            ->add('vitalCardNumber', TextType::class, ['label' => 'Numéro de carte vitale',
            'label_attr' =>['class' => 'form-label'],
            'attr' =>['class' => 'form-control']])
            ->add('Enregistrer',SubmitType::class,
            ['label' => $options['button_label'],
            'attr' => ['class' => 'btn btn-success']
            ])
        ;
          

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patients::class,
            'button_label' => '',
        ]);
    }
}
