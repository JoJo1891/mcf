<?php

namespace App\Repository;

use App\Entity\StyleCoiffeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StyleCoiffeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method StyleCoiffeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method StyleCoiffeur[]    findAll()
 * @method StyleCoiffeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StyleCoiffeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StyleCoiffeur::class);
    }

    // /**
    //  * @return StyleCoiffeur[] Returns an array of StyleCoiffeur objects
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

    
    public function findOneByIduserIdstyle($idUser, $idStyle): ?StyleCoiffeur
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.idUser = :idu')
            ->setParameter('idu', $idUser)
            ->andWhere('s.idStyle = :ids')
            ->setParameter('ids', $idStyle)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
}
