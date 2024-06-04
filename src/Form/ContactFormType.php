<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom*',
                'attr' => [
                    'placeholder' => "votre nom"
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom*',
                'attr' => [
                    'placeholder' => "Votre Prénom"
                ]
            ])
            ->add('sujet', TextType::class, [
                'label' => 'Sujet*',
                'attr' => [
                    'placeholder' => "Motif de contact"
                ]
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'placeholder' => "Votre numéro de téléphone"
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail*',
                'attr' => [
                    'placeholder' => "Votre adresse e-mail"
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message*',
                'attr' => [
                    'placeholder' => "Votre message ...",
                    'rows'=>10
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
