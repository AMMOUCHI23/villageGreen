<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(CategorieRepository $categorieRepository): Response
    {
       
        $categories = $categorieRepository->findBy(["parent" => null]);
        //dd($categories);

        return $this->render('accueil/index.html.twig', [
            "categories" => $categories
        ]);
    }


       //Controlleur pour afficher les sous-categories  d'une categories
    //    #[Route('/catalogue/{id}', name: 'app_catalogue')]
    //    public function afficheSCategorie(CategorieRepository $categorieRepository, int $id): Response
    //    {
    //        $categorie= $categorieRepository->find($id);
    //        $sousCategories = $categorie->getNomCategorie();
    //        //dd($sousCategories);
   
    //        return $this->render('catalogue/index.html.twig', [
    //            'categorie' => $categorie,
    //            'sousCategories' => $sousCategories,
    //        ]);
    //    }
 
 

      // Controlleur pour afficher la page d'accueil
    //   #[Route('/', name: 'categorie')]
    //   public function afficheCategorie(CategorieRepository $categorieRepository): Response
    //   {
    //       $categories = $categorieRepository->findAll();
         
    //       return $this->render('catalogue/index.html.twig', [
             
    //           'categories'=>$categories
    //       ]);
    //   }

    
}
