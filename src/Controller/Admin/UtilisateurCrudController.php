<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UtilisateurCrudController extends AbstractCrudController
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public static function getEntityFqcn(): string
    {
        return Utilisateur::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom')->hideWhenUpdating(),
            TextField::new('prenom')->hideWhenUpdating(),
            DateField::new('dateNaissance'),
            TextField::new('telephone'),
            TextField::new('sexe')->hideWhenUpdating(),
            EmailField::new('email')->onlyWhenCreating(),
            ArrayField::new('roles')->hideWhenUpdating(),
        ];

        if ($pageName === Crud::PAGE_NEW) {
            $password = TextField::new('password')
                ->setFormType(RepeatedType::class)
                
                ->setFormTypeOptions([
                    'type' => PasswordType::class,
                    'first_options' => ['label' => 'Password'],
                    'second_options' => ['label' => 'Repeat Password'],
                ])
                ->setRequired(true)
                ->onlyOnForms();

            $fields[] = $password;
        }

        return $fields;
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof Utilisateur) {
            $password = $entityInstance->getPassword();
            if ($password) {
                $hashedPassword = $this->hasher->hashPassword($entityInstance, $password);
                $entityInstance->setPassword($hashedPassword);
            }
        }

        parent::persistEntity($entityManager, $entityInstance);
    }
     // ajouter des options d'affichage
     public function configureCrud(Crud $crud): Crud
     {
         return $crud
             ->setEntityLabelInSingular('Utilisateur') //Titre Singulier
             ->setEntityLabelInPlural('Utilisateurs')  // Titre pluriel
             ->setDateTimeFormat('dd-MM-yyyy HH:mm:ss '); // format de la date
             
             
     }
}
