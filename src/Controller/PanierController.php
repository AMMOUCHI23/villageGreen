<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use App\Service\PanierService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
   #[Route('/panier', name: 'panier')]
    public function affichePanier(RequestStack $requestStack, ProduitRepository $produitRepository): Response
    { 
        $panier = $requestStack->getSession()->get("panier", []);
        $panierDetails = [];
        $coeficient = 1.6; //Coeficient de vente 
        $totalHT=0;
        // Récupérer les détails de chaque produit dans le panier
        foreach ($panier as $produitId => $quantite) { 
            $produit = $produitRepository->find($produitId );
            
            if ($produit) {
                $prix=$produit->getPrixAchat()*1.6;
                $totalHT += $prix  * $quantite;
                $panierDetails[] = [
                    'produit' => $produit,
                    'quantite' => $quantite,
                    'prix'=> $prix
                ];
            }
        }
        $requestStack->getSession()->set('totalHT', $totalHT);
        
        return $this->render('panier/panier.html.twig', [
            'panierDetails' => $panierDetails,
            'totalHT'=>$totalHT
        ]);

    }


  // ajouter un produit
    #[Route('/ajout-produit/{id}', name: 'ajoutPanier')]
    public function ajout(int $id, PanierService $panierService): Response
    {
       $panier= $panierService->ajouterProduit($id);
      
       return $this->redirectToRoute('panier');
                
            
    }

     // Modifier le panier
     #[Route('/midifier-panier/{id}', name: 'modifPanier')]
     public function modifPanier(int $id, PanierService $panierService): Response
     {
        $panier= $panierService->modifierPanier($id);
       
        return $this->redirectToRoute('panier');
                       
     }

       // Supprimer un produit du panier
       #[Route('/supprimer-produit/{id}', name: 'supprimeProduit')]
       public function supprimeProduit(int $id, PanierService $panierService): Response
       {
          $panier= $panierService->supprimerProduit($id);
         
          return $this->redirectToRoute('panier');
                         
       }
}
    // //supprimer un produit 
    // #[Route('/supprimer-produit/{id}', name: 'supprimePanier')]
    // public function supprimerProduit(int $id): Response
    // {
    //     $this->panierService->supprimeProduit($id);

    //     return $this->redirectToRoute('afficher_panier');
    // }

    /**
     * @Route("/afficher-panier", name="afficher_panier")
     */
    // #[Route('/panier', name: 'panier')]
    // public function afficherPanier(Request $request): Response
    // {
    //     $panier = $request->getSession()->get('produit', []);
    //     dd($panier);

    //     return $this->render('panier/panier.html.twig', [
    //         'panier' => $panier,
    //     ]);
    // }

