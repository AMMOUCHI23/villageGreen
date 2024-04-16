<?php

namespace App\Controller\Admin;

use App\Entity\Fournisseur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FournisseurCrudController extends AbstractCrudController
{
    // ajouter des options d'affichage
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Fournisseur') //Titre Singulier
            ->setEntityLabelInPlural('Fournisseurs');  // Titre pluriel
            
            
            
    }
    public static function getEntityFqcn(): string
    {
        return Fournisseur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
           return [
         IdField::new('id')->hideOnForm(),
         TextField::new('numero_siret')
         ->hideWhenUpdating(),
         TextField::new('nomEntreprise'),
         TextField::new('categorieFournisseur'),
         TextField::new('adresse'),
         TextField::new('telephone'),
         EmailField::new('email'),
        
           
        ];
        
    }
    
}
