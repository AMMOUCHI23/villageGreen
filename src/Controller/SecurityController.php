<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Repository\ClientRepository;
use App\Repository\LigneCommandeRepository;
use App\Repository\LigneLivraisonRepository;
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
        public function afficheDetails(int $id,Commande $commande, LigneCommandeRepository $ligne): response
        {
            // $utilisateur =$this->getUser(); 
            // $commandes=$utilisateur->getClient()->getCommandes();
            $details = $ligne->findBy(['Commande'=>$id]);
           // dd($details);
        
        return $this->render('security/details.html.twig', [
            
            'details'=> $details
        ]);
    
        }

}
