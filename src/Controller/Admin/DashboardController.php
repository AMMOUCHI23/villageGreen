<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Employe;
use App\Entity\Fournisseur;
use App\Entity\Produit;
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
            
            MenuItem::section('Catalogue'),
            MenuItem::linkToCrud('Categories', 'fa fa-tags', Categorie::class),
            MenuItem::linkToCrud('Produits', 'fa fa-file-text', Produit::class),
            MenuItem::linkToCrud('Employe', 'fa fa-tags', Employe::class),
            MenuItem::linkToCrud('Fournisseurs', 'fa fa-file-text', Fournisseur::class),
        ];
    }
}
