<?php

namespace App\Repository;

use App\Entity\Silo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Silo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Silo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Silo[]    findAll()
 * @method Silo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SiloRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Silo::class);
    }

    // /**
    //  * @return Silo[] Returns an array of Silo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Silo
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
