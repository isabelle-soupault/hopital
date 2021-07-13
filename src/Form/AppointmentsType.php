<?php

namespace App\Form;

use App\Entity\Appointments;
use App\Entity\Patients;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AppointmentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startTime', DateTimeType::class, [
                'label' =>'Début',
                'label_attr'=>['class' => 'form-label'],
                
            ])

            ->add('endTime', DateTimeType::class, [
                'label' =>'Fin',
                'label_attr'=>['class' => 'form-label'],
            ])

            ->add('Patients', EntityType::class, [

                'mapped' => true,                // looks for choices from this entity
                'class' => Patients::class,               
                'choice_label' => function ($patients){
                    return strtoupper($patients->getLastname()) . ' ' . $patients->getFirstname();
                },
                'placeholder' => 'Patient',
                'label' => 'Nom du patient',
                'label_attr'=>['class' => 'form-label'],
                'attr'=>['class' => 'form-control']
            ])
            ->add('Enregistrer',SubmitType::class,
            ['label' => $options['button_label'],
            'attr' => ['class' => 'btn btn-outline-success']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Appointments::class,
            'button_label' =>'',
        ]);
    }
}
