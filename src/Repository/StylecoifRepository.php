<?php

namespace App\Repository;

use App\Entity\Stylecoif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Stylecoif|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stylecoif|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stylecoif[]    findAll()
 * @method Stylecoif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StylecoifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stylecoif::class);
    }

    // /**
    //  * @return Stylecoif[] Returns an array of Stylecoif objects
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
    public function findOneBySomeField($value): ?Stylecoif
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
