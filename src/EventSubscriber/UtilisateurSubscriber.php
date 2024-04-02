<?php

namespace App\EventSubscriber;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UtilisateurSubscriber implements EventSubscriberInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        dd("test");
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::postPersist => 'postPersist',
        ];
    }

    public function postPersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        if ($entity instanceof Utilisateur) {
            $dateNaissance = $entity->getDateNaissance();
            dd($dateNaissance);
        }
    }
}
