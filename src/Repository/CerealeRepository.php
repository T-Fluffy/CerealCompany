<?php

namespace App\Repository;

use App\Entity\Cereale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cereale|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cereale|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cereale[]    findAll()
 * @method Cereale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CerealeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cereale::class);
    }

    // /**
    //  * @return Cereale[] Returns an array of Cereale objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cereale
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
