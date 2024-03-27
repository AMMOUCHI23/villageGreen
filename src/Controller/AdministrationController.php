<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Produit;
use App\Form\CategorieFormType;
use App\Form\ProduitFormType;
use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdministrationController extends AbstractController
{
    #[Route('/administration', name: 'app_administration')]
    public function index(): Response
    {
        return $this->render('administration/index.html.twig', [
            'controller_name' => 'AdministrationController',
        ]);
    }

    //afficher touts les categories parents

    #[Route('/administration/categorie', name: 'app_listeCatégorie')]
    public function listeCatégorie(CategorieRepository $catrepo): Response
    {
        $categories = $catrepo->findBy(['parent' => null]);
        return $this->render('administration/listeCategorie.html.twig', [
            'categories' => $categories
        ]);
    }

    // Afficher les sous_catégories d'une catégorie
    #[Route('administration/categorie/{id}', name: 'app_listeSousCategorie')]
    public function listeSousCategorie(Categorie $categorie, int $id): Response
    {
        //dd($categorie);
        return $this->render('administration/listeSousCategorie.html.twig', [
            'categorie' => $categorie
        ]);
    }



    //afficher les produits d'une sous categorie

    #[Route('/administration/produit/{id}', name: 'app_listeProduit')]
    public function listeProduit(Categorie $categorie, int $id): Response
    {


        return $this->render('administration/listeProduit.html.twig', [
            'categorie' => $categorie
        ]);
    }




     //modifier une categorie
     #[Route('/categorie/{id}/modifier', name: 'app_modifierCategorie')]
     public function modifierCategorie(Categorie $categorie, Request $request, EntityManagerInterface $em): Response
     {
         
         $form = $this->createForm(CategorieFormType::class, $categorie);
         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
             $em->flush();
             $this->addFlash('success', 'la catégorie a été modifier avec succés');
 
             return $this->redirectToRoute('app_listeCatégorie');
         }
         return $this->render('administration/modifCategorie.html.twig', [
             'categorie' => $categorie,
             'form' => $form
         ]);
     }
 


     //ajouter une categorie
     #[Route('/categorie/ajouter', name: 'app_ajouterCategorie')]
     public function ajouterCategorie( Request $request, EntityManagerInterface $em): Response
     {
         $categorie=new Categorie();
         $form = $this->createForm(CategorieFormType::class,$categorie);
         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
           //dd($categorie);
            $em->persist($categorie);
            $em->flush();
             $this->addFlash('success', 'la catégorie a été ajouter avec succés');
 
             return $this->redirectToRoute('app_listeCatégorie');
         }
         return $this->render('administration/ajouterCategorie.html.twig', [
             
             'form' => $form
         ]);
     }
 
// supprimer une categorie

#[Route('/categorie/supprimer/{id}', name: 'app_supprimerCategorie')]
public function suppimerCategorie( Categorie $cat, EntityManagerInterface $em): Response
{
       //dd($cat);
       $em->remove($cat);
       $em->flush();
        $this->addFlash('success', 'la catégorie a été supprimée avec succés');

        return $this->redirectToRoute('app_listeCatégorie');
    
}

    //modifier un produit
    #[Route('/produit/{id}/modifier', name: 'app_modifierProduit')]
    public function modifierProduit(Produit $produit, Request $request, EntityManagerInterface $em): Response
    {
        //dd($produit);
        $form = $this->createForm(ProduitFormType::class, $produit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'le produit a été modifier avec succés');

            //return $this->redirectToRoute('accueil');
        }
        return $this->render('administration/modifProduit.html.twig', [
            'produit' => $produit,
            'form' => $form
        ]);
    }
}
