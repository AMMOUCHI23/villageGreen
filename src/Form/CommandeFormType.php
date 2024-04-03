<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Commande;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('adresse_livraison',TextType::class , [
                'label'=>false,
                'attr'=>[
                    'placeholder'=>"numéro et nom de la rue*"
                ]
            ] )
            ->add('cp_livraison',TextType::class , [
                'label'=>false,
                'attr'=>[
                    'placeholder'=>"code postal*"
                ]
            ] )
            ->add('ville_livraison',TextType::class , [
                'label'=>false,
                'attr'=>[
                    'placeholder'=>"ville*"
                ]
            ] )
            ->add('adresse_facturation',TextType::class , [
                'label'=>false,
                'attr'=>[
                    'placeholder'=>"numéro et nom de la rue*"
                ]
            ] )
            ->add('cp_facturation',TextType::class , [
                'label'=>false,
                'attr'=>[
                    'placeholder'=>"code postal*"
                ]
            ] )
            ->add('ville_facturation',TextType::class , [
                'label'=>false,
                'attr'=>[
                    'placeholder'=>"ville*"
                ]
            ] )
            
            ->add('mode_paiement', ChoiceType::class,[

                'choices' => [
                    'Carte de crédit' => 'credit_card',
                    'Chèque' => 'chèque',
                    'Virement bancaire' => 'bank_transfer',
                ],
                'label'=>'Mode de paiement*',
                'label_attr'=>[
                   'class'=>"form-label mt-4"
                ]
                ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
