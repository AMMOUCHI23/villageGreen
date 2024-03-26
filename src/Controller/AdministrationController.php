<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitFormType;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdministrationController extends AbstractController
{
    #[Route('/administration', name: 'app_administration')]
    public function index(): Response
    {
        return $this->render('administration/index.html.twig', [
            'controller_name' => 'AdministrationController',
        ]);
    }

    //afficher touts les produit

    #[Route('/administration/produit', name: 'app_listeProduit')]
    public function listeProduit(ProduitRepository $produitRepo): Response
    {
        $produits=$produitRepo->findAll();
        return $this->render('administration/listeProduit.html.twig', [
           'produits'=>$produits
        ]);
    }

    //modifier un produit
    #[Route('/produit/{id}/modifier', name: 'app_modifierProduit')]
    public function modifierProduit(Produit $produit, Request $request, EntityManagerInterface $em): Response
    {
            //dd($produit);
            $form= $this->createForm(ProduitFormType::class, $produit );
            $form->handleRequest($request);
            if($form->isSubmitted()&& $form->isValid()){
              $em->flush();
              $this->addFlash('success', 'le produit a été modifier avec succés');

              //return $this->redirectToRoute('accueil');
            }
        return $this->render('administration/modifProduit.html.twig', [
            'produit'=>$produit,
            'form'=>$form
        ]);
    }
}
