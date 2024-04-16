<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategorieCrudController extends AbstractCrudController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public static function getEntityFqcn(): string
    {
        return Categorie::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $repo = $this->em->getRepository(Categorie::class);
        $id=IdField::new('id')->onlyOnIndex();
        $nom = TextField::new('nomCategorie');
        $photo = ImageField::new('photo')
            ->setUploadDir('public/assets/images/imagesAdmin')
            ->setBasePath('/assets/images/imagesAdmin');
        $categorie = AssociationField::new("parent")
                ->setQueryBuilder(
                    function(QueryBuilder $qb) {
                        return $qb->where("entity.parent is null");
                    }
                );
        return [ $id,$nom, $photo, $categorie ];
    }
     // ajouter des options d'affichage
     public function configureCrud(Crud $crud): Crud
     {
         return $crud
             ->setEntityLabelInSingular('Catégorie') //Titre Singulier
             ->setEntityLabelInPlural('Catégories');  // Titre pluriel
             
             
             
     }
}
