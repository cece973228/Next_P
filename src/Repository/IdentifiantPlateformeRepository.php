<?php

namespace App\Repository;

use App\Entity\IdentifiantPlateforme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IdentifiantPlateforme|null find($id, $lockMode = null, $lockVersion = null)
 * @method IdentifiantPlateforme|null findOneBy(array $criteria, array $orderBy = null)
 * @method IdentifiantPlateforme[]    findAll()
 * @method IdentifiantPlateforme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IdentifiantPlateformeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IdentifiantPlateforme::class);
    }

    // /**
    //  * @return IdentifiantPlateforme[] Returns an array of IdentifiantPlateforme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IdentifiantPlateforme
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
