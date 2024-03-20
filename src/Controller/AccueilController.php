<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('accueil/index.html.twig', [
            
        ]);
    }

      // Controlleur pour afficher la page d'accueil
      #[Route('/', name: 'categorie')]
      public function afficheCategorie(CategorieRepository $categorieRepository): Response
      {
          $categories = $categorieRepository->findAll();
         
          return $this->render('catalogue/index.html.twig', [
             
              'categories'=>$categories
          ]);
      }

    
}
