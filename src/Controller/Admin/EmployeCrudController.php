<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use App\Entity\Employe;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EmployeCrudController extends AbstractCrudController
{
     // ajouter des options d'affichage
     public function configureCrud(Crud $crud): Crud
     {
         return $crud
             ->setEntityLabelInSingular('Employé') //Titre Singulier
             ->setEntityLabelInPlural('Employés')  // Titre pluriel
             ->setDateTimeFormat('dd-MM-yyyy HH:mm:ss '); // format de la date
             
             
     }
    public static function getEntityFqcn(): string
    {
        return Employe::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('Utilisateur'),
            TextField::new('poste'),
            


        ];
    }
}
