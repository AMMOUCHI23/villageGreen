<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Form\CommandeFormType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function index(Request $request, RequestStack $requestStack): Response
    {
        $commandeForm = $this->createForm(CommandeFormType::class);
        $total=$requestStack->getSession()->get('total_panier');
        $utilisateur=$this->getUser();
      
        $commandeForm->handleRequest($request);
        
         if ($commandeForm->isSubmitted() && $commandeForm->isValid()) { 
            $commande=$commandeForm->getData();

             $commande->setDateCommande(new DateTime())
                      ->setTotalCommande($total)
                      ->setStatut("en cours de vérification")
                      ->setPayee(1)
                      ->setTotalPaye($total)
                      ->setClient($utilisateur);
                       dd($commande);          
    }
          
        //     $commande->setDateCommande(new DateTime())
        //             ->setTotalCommande()
        //             ->setAdresseLivraison()
    
        return $this->render('commande/index.html.twig', [
            'commandeForm'=>$commandeForm
        ]);
    }
}
