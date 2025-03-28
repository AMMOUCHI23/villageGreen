<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use phpDocumentor\Reflection\Types\Integer;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('reference')->hideWhenUpdating(),
            ImageField::new('photo')
            ->setUploadDir('public/assets/images/imagesAdmin')
            ->setBasePath('/assets/images/imagesAdmin'),
            TextField::new('libelle'),
            TextField::new('dimenssion'),
            TextField::new('couleur'),
            BooleanField::new('actif'),
            IntegerField::new('quantite_stock'),
            IntegerField::new('stock_alert'),
            AssociationField::new('fournisseur'),
            AssociationField::new('Categorie')
            ->setQueryBuilder(
                function(QueryBuilder $qb) {
                    return $qb->where("entity.parent is notnull");
                }
            ),
            NumberField::new('prix_achat'),


            TextEditorField::new('description'),
        ];
    }
    
      // ajouter des options d'affichage
      public function configureCrud(Crud $crud): Crud
      {
          return $crud
              ->setEntityLabelInSingular('Produit') //Titre Singulier
              ->setEntityLabelInPlural('Produits');  // Titre pluriel
              
              
              
      }
}
