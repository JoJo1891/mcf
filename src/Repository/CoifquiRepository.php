<?php

namespace App\Repository;

use App\Entity\Coifqui;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Coifqui|null find($id, $lockMode = null, $lockVersion = null)
 * @method Coifqui|null findOneBy(array $criteria, array $orderBy = null)
 * @method Coifqui[]    findAll()
 * @method Coifqui[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoifquiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Coifqui::class);
    }

    // /**
    //  * @return Coifqui[] Returns an array of Coifqui objects
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
    public function findOneBySomeField($value): ?Coifqui
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
