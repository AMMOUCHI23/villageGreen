<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Commande;
use App\Entity\Employe;
use App\Entity\Fournisseur;
use App\Entity\Produit;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Bundle\MakerBundle\Doctrine\EntityClassGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        return $this->render('admin/dashboard.html.twig', [
        ]);
        
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('VillageGreen');
    }

    public function configureMenuItems(): iterable
    {
        return [

            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            
            MenuItem::section('Gestion du catalogue'),
            MenuItem::linkToCrud('Categories', 'fa fa-table', Categorie::class),
            MenuItem::linkToCrud('Produits', 'fa fa-list', Produit::class),
            MenuItem::section('Gestion des utilisateurs'),
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-users', Utilisateur::class),
            MenuItem::linkToCrud('Employe', 'fa fa-users-rays', Employe::class),
            MenuItem::section('Gestion des fournisseurs'),
            MenuItem::linkToCrud('Fournisseurs', 'fa fa-landmark', Fournisseur::class),
            MenuItem::section('Gestion des commandes'),
            MenuItem::linkToCrud('Commande', 'fa fa-sort', Commande::class)
        ];
    }
}
