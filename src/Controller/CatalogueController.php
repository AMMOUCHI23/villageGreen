<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CatalogueController extends AbstractController
{
    // Afficher les sous_catégories d'une catégorie
    #[Route('/categorie/{id}', name: 'Sous_categorie')]
    public function index(CategorieRepository $categorieRepository, int $id): Response
    {
        $categorie = $categorieRepository->find($id);
        $sousCategories = $categorie->getCategories();
        //dd($sousCategories);

        return $this->render('catalogue/index.html.twig', [
            'categorie' => $categorie,
            'sousCategories' => $sousCategories,
        ]);
    }
    // Afficher les produis d'une sous catégorie
    #[Route('/categorie/produit/{id}', name: 'produits')]
    public function afficheProduits(CategorieRepository $categorieRepository, ProduitRepository $produitRepository, int $id): Response
    {
        $sousCategorie = $categorieRepository->find($id);
        //dd($sousCategorie);
        $produits =$produitRepository->findBy(['Categorie'=>$sousCategorie]);
       
        //dd($sousCategories);

        return $this->render('catalogue/produits.html.twig', [
            'sousCategorie' => $sousCategorie,
            'produits' => $produits
        ]);
    }


     // Afficher le détail d'un produit 
     #[Route('/categorie/produit/details/{id}', name: 'details_produit')]
     public function afficheDétails( ProduitRepository $produitRepository, int $id): Response
     {
         $produit = $produitRepository->find($id);
         //dd($produit);
    
 
         return $this->render('catalogue/details.html.twig', [
             
             'produit' => $produit
         ]);
     }
}
