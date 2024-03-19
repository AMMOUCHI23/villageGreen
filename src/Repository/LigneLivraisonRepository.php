<?php

namespace App\Repository;

use App\Entity\LigneLivraison;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LigneLivraison>
 *
 * @method LigneLivraison|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneLivraison|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneLivraison[]    findAll()
 * @method LigneLivraison[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneLivraisonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneLivraison::class);
    }

    //    /**
    //     * @return LigneLivraison[] Returns an array of LigneLivraison objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('l.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?LigneLivraison
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
