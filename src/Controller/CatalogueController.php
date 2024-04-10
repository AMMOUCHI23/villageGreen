<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Data\SearchData;
use App\Entity\Utilisateur;
use App\Form\ChercheFormType;
use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    #[Route('/cherche', name: 'cherche')]
    public function cherche(ProduitRepository $produitRepo, Request $request): Response
    {    
        $form = $this->createForm(ChercheFormType::class);
        $produits = []; // Initialisation de la variable $produits
    
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $cherche = $data['cherche'];
    
            // Vérifie si la recherche n'est pas vide
            if (!empty($cherche)) {
                // Requête pour rechercher les produits avec l'autocomplétion
                $produits = $produitRepo->createQueryBuilder('p')
                    ->where('p.libelle LIKE :cherche')
                    ->setParameter('cherche', '%' . $cherche . '%')
                    ->getQuery()
                    ->getResult();
            } else {
                // Ajouter un message si la recherche est vide
                $this->addFlash('warning', 'Veuillez entrer un terme de recherche.');
            }
            // return $this->render('catalogue/cherchePage.html.twig', [
            //     'form' => $form->createView(),
            //     'produits' => $produits
            // ]);
        }
    
        return $this->render('catalogue/cherchePage.html.twig', [
            'form' => $form->createView(),
            'produits' => $produits
        ]);
    }

}
