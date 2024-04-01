<?php
namespace App\EventListener;

use App\Entity\Utilisateur;
use App\Entity\Client;
use App\Entity\Employe;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class UtilisateurListener
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        // Si l'entité nouvellement créée est un Utilisateur
        if ($entity instanceof Utilisateur) {
            $papo=$entity->getRoles();
            dd($papo);
            // Vérifier si l'utilisateur doit être associé à une entrée Client ou Employé
            if ($entity->getRoles() == []) {
                // Créer une entrée Client correspondante
                $client = new Client();
                // Affecter l'utilisateur à l'entité Client
                $client->setUtilisateur($entity);
                // Enregistrer l'entité Client
                $this->entityManager->persist($client);
                $this->entityManager->flush();
            } elseif ($entity->getRoles() === 'ROLE_EMPLOYE') {
                // Créer une entrée Employé correspondante
                $employe = new Employe();
                // Affecter l'utilisateur à l'entité Employé
                $employe->setUtilisateur($entity);
                // Enregistrer l'entité Employé
                $this->entityManager->persist($employe);
                $this->entityManager->flush();
            }
        }
    }
}
