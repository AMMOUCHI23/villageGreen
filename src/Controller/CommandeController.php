<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\LigneCommande;
use App\Form\CommandeFormType;
use App\Repository\ClientRepository;
use App\Repository\ProduitRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function index(Request $request, RequestStack $requestStack, ClientRepository $cl,EntityManagerInterface $em,ProduitRepository $produitRepository): Response
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
                      ->setTotalPaye($total);
                     
            $utilisateur=$this->getUser();
            $client = $cl->findOneBy(['utilisateur' => $utilisateur]);
            $commande->setClient($client);

        // Récupérer les détails du panier
        $detailsPanier=$requestStack->getSession()->get('panier');
        
       // récupérer le coefficient de vent
       $coefficient=$client->getCoefficient();
        foreach ($detailsPanier as $id => $qu) {
            $produit=$produitRepository->find($id);
            $ligneCommande=new LigneCommande();
            $ligneCommande->setCommande( $commande)
                          ->setProduit( $produit)
                          ->setPrixVente( ($produit->getPrixAchat())*$coefficient)
                          ->setQuantite( $qu)
                          ->setLibelle( $produit->getLibelle());
            $em->persist($ligneCommande);
        }
            $em->persist($commande);
            $em->flush($commande);   
             // supprimer le panier dans la sission 
             $requestStack->getSession()->remove("panier");

             // Ajouter un message flash de succès
             $this->addFlash('success', 'Votre commande a été passée avec succès.'); 
    }
          
        //     $commande->setDateCommande(new DateTime())
        //             ->setTotalCommande()
        //             ->setAdresseLivraison()
    
        return $this->render('commande/index.html.twig', [
            'commandeForm'=>$commandeForm
        ]);
    }
}
