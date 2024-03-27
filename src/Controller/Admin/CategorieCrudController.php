<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
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

        $nom = TextField::new('nomCategorie');
        $photo = ImageField::new('photo')
            ->setUploadDir('public/assets/images')
            ->setBasePath('/assets/images/');
        $categorie = AssociationField::new("parent")
                ->setQueryBuilder(
                    function(QueryBuilder $qb) {
                        return $qb->where("entity.parent is null");
                    }
                );
        return [ $nom, $photo, $categorie ];
    }
}
