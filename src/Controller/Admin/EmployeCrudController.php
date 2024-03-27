<?php

namespace App\Controller\Admin;
use App\Entity\Utilisateur;
use App\Entity\Employe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EmployeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Employe::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
         IdField::new('id')->hideOnForm(),
         AssociationField::new('utilisateur_id'),
         TextField::new('nom'),
         TextField::new('prenom'),
         TextField::new('poste'),
         TextField::new('telephone'),
         TextField::new('sexe'),
         EmailField::new('email')->hideWhenUpdating(),
        
           
        ];
    }
    
}
