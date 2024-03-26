<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CatalogueController extends AbstractController
{
    // afficher toutes les catégories parents
    #[Route('/', name: 'accueil')]
    public function afficheCategorie(CategorieRepository $categorieRepository): Response
    {

        $categories = $categorieRepository->findBy(["parent" => null]);


        return $this->render('accueil/index.html.twig', [
            "categories" => $categories
        ]);
    }

    // Afficher les sous_catégories d'une catégorie
    #[Route('/categorie/{id}', name: 'Sous_categorie')]
    public function index(Categorie $categorie, int $id): Response
    {

        return $this->render('catalogue/index.html.twig', [
            'categorie' => $categorie
        ]);
    }

    // Afficher les produis d'une sous catégorie
    #[Route('/produit/{id}', name: 'produits')]
    public function afficheProduits(Categorie $categorie, int $id): Response
    {

        return $this->render('catalogue/produits.html.twig', [
            'categorie' => $categorie

        ]);
    }


    //  // Afficher le détail d'un produit 
    #[Route('/details/{id}', name: 'details_produit')]
    public function afficheDétails(ProduitRepository $produitRepository, int $id): Response
    {
        $produit = $produitRepository->find($id);



        return $this->render('catalogue/details.html.twig', [

            'produit' => $produit
        ]);
    }
}
