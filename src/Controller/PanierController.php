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
        $total=0;
        // Récupérer les détails de chaque produit dans le panier
        foreach ($panier as $produitId => $quantite) { 
            $produit = $produitRepository->find($produitId );
            
            if ($produit) {
                $prix=$produit->getPrixAchat()*1.6;
                $total += $prix  * $quantite;
                $panierDetails[] = [
                    'produit' => $produit,
                    'quantite' => $quantite,
                    'prix'=> $prix
                ];
            }
        }
        
        return $this->render('panier/panier.html.twig', [
            'panierDetails' => $panierDetails,
            'total'=>$total
        ]);

    }


  // ajouter un produit
    #[Route('/ajout-produit/{id}', name: 'ajoutPanier')]
    public function ajout(int $id, PanierService $panierService,Produit $produit): Response
    {
       $panier= $panierService->ajouterProduit($id);
      
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

