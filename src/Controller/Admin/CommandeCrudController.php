<?php

namespace App\Controller\Admin;

use App\Entity\Commande;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CommandeCrudController extends AbstractCrudController
{
    // ajouter des options d'affichage
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Commande') //Titre Singulier
            ->setEntityLabelInPlural('Commandes')  // Titre pluriel
            ->setDateTimeFormat('dd-MM-yyyy HH:mm:ss '); // format de la date
            
            
    }
    public static function getEntityFqcn(): string
    {
        return Commande::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            IntegerField::new('numero_facture')->hideWhenUpdating(),
            DateTimeField::new('date_facture')->hideWhenUpdating(),
            DateTimeField::new('date_commande')->hideWhenUpdating() ,
            TextField::new('adresse_livraison')->hideWhenUpdating() ,
            TextField::new('cp_livraison')->hideWhenUpdating() ,
            TextField::new('ville_livraison')->hideWhenUpdating() ,
            TextField::new('statut'),
            NumberField::new('total_commande')->hideWhenUpdating(),
            TextField::new('statut'),
            TextField::new('mode_paiement')->hideWhenUpdating(),
            NumberField::new('total_paye')->hideWhenUpdating(),

        ];
    }
    
}
