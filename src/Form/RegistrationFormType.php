<?php

namespace App\Form;

use App\Entity\Utilisateur;
use DateTime;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'sexe',
                ChoiceType::class,
                [
                    'label' => 'Civilité',
                    'choices' => [
                        'Madame' => 'Madame',
                        'Monsieur' => 'Monsieur',
                    ],

                    'multiple' => false, // pour n'autoriser qu'un seul choix
                    'required' => true, // si le champ est obligatoire
                ]
            )
            ->add('nom', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "Nom*"
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "Prénom*"
                ]
            ])
            ->add('dateNaissance', DateType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "Date de naissance"
                ]
            ])
            ->add('telephone', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "Téléphone"
                ]
            ])
            ->add('adresse', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "Nom et Numéro de la rue"
                ]
                ])
    
                ->add('CP', TextType::class, [
                    'label' => false,
                    'attr' => [
                        'placeholder' => "Code postal"
                    ]
                ])
    
                ->add('ville', TextType::class, [
                    'label' => false,
                    'attr' => [
                        'placeholder' => "Ville"
                    ]
                ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => "adresse email*"
                ],
                'label' => false
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
         
           

            ->add('coefficient', TextType::class, [
                'label' => false,
                'mapped' => false,
                'required' => false,
                'attr' => ['class' => 'd-none'],
            ])
            ->add('reduction', TextType::class, [
                'mapped' => false,
                'label' => false,
                'required' => false,
                'attr' => ['class' => 'd-none'],
            ])
            ->add('referenceClient', TextType::class, [
                'mapped' => false,
                'label' => false,
                'required' => false,
                'attr' => ['class' => 'd-none'],
            ])

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => [
                    'label' => false,
                    'attr' => [
                        'placeholder' => "Mot de passe*"
                    ]
                ],
                'second_options' => [
                    'label' => false,
                    'attr' => [
                        'placeholder' => "Confirmation de mot de passe*"
                    ]
                ],

                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
