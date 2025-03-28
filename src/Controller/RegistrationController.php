<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Utilisateur;
use App\Form\RegistrationFormType;
use App\Repository\EmployeRepository;
use App\Security\EmailVerifier;
use App\Service\SecurisationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, EmployeRepository $emp, SecurisationService $secu): Response
    {
        $user = new Utilisateur();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            //récupérer et vérirfier le nom 
            $nom = $form->getData()->getNom();
            $nom = $secu->securisation($nom);
            $user->setNom($nom);

            //récupérer et vérirfier le prenom 
            $prenom = $form->getData()->getPrenom();
            $prenom = $secu->securisation($prenom);
            $user->setPrenom($prenom);


            //récupérer et vérirfier l'adresse
            $adresse = $form->getData()->getAdresse();
            $adresse = $secu->securisation($adresse);
            $user->setAdresse($adresse);

              //récupérer et vérirfier le nom de la ville
              $ville = $form->getData()->getVille();
              $ville = $secu->securisation($ville);
              $user->setVille($ville);
  


            // recupérer et hasher le mot de passe
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )

            );
            // Ajouter le role Client pour le nouveau utilisateur
            $user->setRoles(['ROLE_CLIENT']);

            // Enregestrer le nouveau utilisateur d
            $entityManager->persist($user);
            $entityManager->flush();

            //Récupérer l'id du nouveau
            $id = $user->getId();


            //Créer un nouveau client 
            $client = new Client();
            $client->setUtilisateur($user)
                ->setType("particulier")
                ->setCoefficient(1.6)
                ->setReduction(1)
                ->setReferenceClient("C" . $id); // la référence des clients particulier commence toujours avec la lettre C suivi de l'id de l'utilisateur
            //récupéré l'employé
            $employe = $emp->findOneById(2);
            $client->setEmploye($employe);




            $entityManager->persist($client);
            $entityManager->flush();

            // envoyer un e-mail au nouveau client pour vérifier l'addresse mail
            $this->emailVerifier->sendEmailConfirmation(
                'app_verify_email',
                $user,
                (new TemplatedEmail())
                    ->from(new Address('villagegreen.meubles@gmail.com', 'Village Green'))
                    ->to($user->getEmail())
                    ->subject('Validation e-mail')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );

            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }

    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Votre adresse mail est vérifié.');

        return $this->redirectToRoute('app_register');
    }
}
