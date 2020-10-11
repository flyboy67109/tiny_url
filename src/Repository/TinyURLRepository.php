<?php

namespace App\Repository;

use App\Entity\TinyURL;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TinyURL|null find($id, $lockMode = null, $lockVersion = null)
 * @method TinyURL|null findOneBy(array $criteria, array $orderBy = null)
 * @method TinyURL[]    findAll()
 * @method TinyURL[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TinyURLRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TinyURL::class);
    }

    // /**
    //  * @return TinyURL[] Returns an array of TinyURL objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TinyURL
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
