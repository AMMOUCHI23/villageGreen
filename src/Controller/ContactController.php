<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
     // controlleur pour afficher les Mentions légales
     #[Route('/Mentions_Legales', name: 'mentionsL')]
     public function mentionsLegales(): Response
     {   
     
         
         return $this->render('contact/mentionslegales.html.twig', [
             
         ]);
     
     }
 
         // controlleur pour afficher la politique de confidentialité
         #[Route('/plitique_de_confidentialite', name: 'politique')]
         public function politiqueDeConfidentialite(): Response
         {   
         
             
             return $this->render('contact/politique.html.twig', [
                 
             ]);
         
         }
}
