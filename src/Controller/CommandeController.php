<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\LigneCommande;
use App\Form\CommandeFormType;
use App\Repository\ClientRepository;
use App\Repository\ProduitRepository;
use App\Service\MailService;
use App\Service\SecurisationService;
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
    public function index(Request $request, RequestStack $requestStack, ClientRepository $cl,EntityManagerInterface $em,
    ProduitRepository $produitRepository, MailService $mailService, SecurisationService $secu): Response
    {
        $commandeForm = $this->createForm(CommandeFormType::class);
        $totalHT=$requestStack->getSession()->get('totalHT');
        $fraisLivraison=45.00; // frais de livraison
        $totalTTC= ($totalHT * 1.2) + $fraisLivraison; // ajouter la TVA DE 20% et les frais de livraison
        $utilisateur=$this->getUser(); 
        
        $commandeForm->handleRequest($request);
        
         if ($commandeForm->isSubmitted() && $commandeForm->isValid()) { 
            $commande=$commandeForm->getData();

            //récupérer et vérirfier l'adresse de livraison 
            $adresseLivraison = $commandeForm->getData()->getAdresseLivraison();
            $adresseLivraison = $secu->securisation($adresseLivraison);
            $commande->setAdresseLivraison($adresseLivraison);

             //récupérer et vérirfier la ville de livraison 
             $villeLivraison = $commandeForm->getData()->getVilleLivraison();
             $villeLivraison = $secu->securisation($villeLivraison);
             $commande->setVilleLivraison($villeLivraison);

              //récupérer et vérirfier l'adresse de facturation 
            $adresseFacturation = $commandeForm->getData()->getAdresseFacturation();
            $adresseFacturation = $secu->securisation($adresseFacturation);
            $commande->setAdresseFacturation($adresseFacturation);

             //récupérer et vérirfier la ville de facturation 
             $villeFacturation = $commandeForm->getData()->getVilleFacturation();
             $villeFacturation = $secu->securisation($villeFacturation);
             $commande->setVilleFacturation($villeFacturation);
 

             $commande->setDateCommande(new DateTime())
                      ->setTotalCommande($totalTTC) 
                      ->setStatut("en cours de vérification")
                      ->setPayee(1)
                      ->setTotalPaye($totalTTC);
                     
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
                          ->setPhoto($produit->getPhoto())
                          ->setLibelle( $produit->getLibelle());
            $em->persist($ligneCommande);
           //définir l'image de la commande
            $commande->setImage($produit->getPhoto());

        }
            $em->persist($commande);
            $em->flush($commande);   
            
            // envoyer un email de confirmation de la commande en utilisant le service 
            $expediteur = 'expediteur@example.com';
            $destinataire =$this->getUser()->getEmail();
            $sujet = 'Confirmation de la commande';
            $message = '';
            $htmlTemplate = 'email/template.html.twig'; // Chemin vers le modèle Twig de l'e-mail
            $context = [
                'commande' => $commande,
    
            ];
            $mailService->sendMail($expediteur, $destinataire, $sujet, $message, $htmlTemplate, $context);
             // supprimer le panier dans la sission 
             $requestStack->getSession()->remove("panier");

             // Ajouter un message flash de succès
             $this->addFlash('success', 'Votre commande a été passée avec succès, vous allez recevoir un mail de confirmation'); 

             return $this->redirectToRoute('catalogue'); // redirection sur la page accueil

             
    }
          
        //     $commande->setDateCommande(new DateTime())
        //             ->setTotalCommande()
        //             ->setAdresseLivraison()
   
        return $this->render('commande/index.html.twig', [
            'commandeForm'=>$commandeForm,
            'totalHT'=>$totalHT,
            'totalTTC'=>$totalTTC
        ]);
    }
}
