<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use App\Service\SecurisationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function contactMessage(Request $request, SecurisationService $secu, EntityManagerInterface $entityManager ): Response
    {
        $contact = new Contact();

        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //récupérer et vérirfier le nom 
            $nom = $form->getData()->getNom();
            $nom = $secu->securisation($nom);
            $contact->setNom($nom);

            //récupérer et vérirfier le prénom 
            $prenom = $form->getData()->getPrenom();
            $prenom = $secu->securisation($prenom);
            $contact->setNom($nom);

            //récupérer et vérirfier le téléphone 
            $telephone = $form->getData()->getTelephone();
            $telephone = $secu->securisation($telephone);
            $contact->setNom($telephone);
            $entityManager->persist($contact);
            $entityManager->flush();

            $this->addFlash('success', 'Nous avons bien reçu votre message, vous allez recevoir une réponse dans 48h ouvrables.');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form,
        ]);
    }

    // controlleur pour afficher les Mentions légales
    #[Route('/Mentions_Legales', name: 'mentionsL')]
    public function mentionsLegales(): Response
    {


        return $this->render('contact/mentionslegales.html.twig', []);
    }

    // controlleur pour afficher la politique de confidentialité
    #[Route('/plitique_de_confidentialite', name: 'politique')]
    public function politiqueDeConfidentialite(): Response
    {


        return $this->render('contact/politique.html.twig', []);
    }
}
