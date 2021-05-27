<?php

namespace App\Repository;

use App\Entity\Quicoiffe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Quicoiffe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Quicoiffe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Quicoiffe[]    findAll()
 * @method Quicoiffe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuicoiffeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Quicoiffe::class);
    }

    // /**
    //  * @return Quicoiffe[] Returns an array of Quicoiffe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Quicoiffe
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
