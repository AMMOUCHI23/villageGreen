<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\LigneCommande;
use App\Entity\Livraison;
use App\Repository\ClientRepository;
use App\Repository\LigneCommandeRepository;
use App\Repository\LigneLivraisonRepository;
use App\Service\PdfService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
         if ($this->getUser()) {
            return $this->redirectToRoute('app_profil');
         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

   // controller qui renvoie vers une page de connexion
   #[Route('/connexion', name:'connexion')]
   public function connexion(): Response
   {
    if ($this->getUser()) {
        return $this->redirectToRoute('app_profil');
     }
   return $this->render('registration/connexion.html.twig');
   }

    // Controller pour afficher le profil
    #[Route(path: '/profil', name: 'app_profil')]
    public function afficheProfil(): response
    {
        $utilisateur =$this->getUser(); 
   
       // dd($commandes);
    
    return $this->render('security/profil.html.twig', [
        'utilisateur'=> $utilisateur,
       
    ]);

    }

       // Controller pour afficher les commandes
       #[Route(path: '/profil/commandes', name: 'commandes')]
       public function afficheCommandes(): response
       {
           $utilisateur =$this->getUser(); 
           $commandes=$utilisateur->getClient()->getCommandes();
          // dd($commandes);
       
       return $this->render('security/commandes.html.twig', [
           
           'commandes'=> $commandes
       ]);
   
       }

        // Controller pour afficher les détails de la commande
        #[Route(path: '/profil/commandes/{id}', name: 'detailsCommande')]
        public function afficheDetails(int $id, LigneCommandeRepository $ligne): response
        {
            
            $details = $ligne->findBy(['Commande'=>$id]);
            //dd($details);
        
        return $this->render('security/details.html.twig', [
            
            'details'=> $details
        ]);
    
        }


        // Controller pour générer une facture
        #[Route(path: '/facture/{id}', name: 'facture.pdf')]
        public function genererFacturePdf(Commande $commande, PdfService $pdf)
        {
        // récupérer les lignes de commandes d'une commande
        $lignes=$commande->getLigneCommandes();
       

        // Récupérer le contenu HTML de la facture en utilisant le moteur de rendu Twig
        $html = $this->renderView('security/facture.html.twig', [
            'commande' => $commande,
            'lignes' => $lignes
        ]);
      
         // Afficher le PDF dans le navigateur
       return  $pdf->affichePdf($html);
    
        }



        // Controller pour générer un bon de livraison
        #[Route(path: '/livraison/{id}', name: 'livraison.pdf')]
        public function genererBonCommandePdf(Livraison $livraison, PdfService $pdf)
        {
        // récupérer les lignes de livraison d'une livraison
        $lignesLivraisons=$livraison->getLigneLivraisons();
       

        // Récupérer le contenu HTML de du bon de commande en utilisant le moteur de rendu Twig
        $html = $this->renderView('security/bonLivraison.html.twig', [
            'livraison' => $livraison,
            'ligneslignesLivraison' => $lignesLivraisons
        ]);
      
         // Afficher le PDF dans le navigateur
       return  $pdf->affichePdf($html);
    
        }

}
