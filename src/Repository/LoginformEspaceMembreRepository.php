<?php

namespace App\Repository;

use App\Entity\LoginformEspaceMembre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LoginformEspaceMembre|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoginformEspaceMembre|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoginformEspaceMembre[]    findAll()
 * @method LoginformEspaceMembre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoginformEspaceMembreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoginformEspaceMembre::class);
    }

    // /**
    //  * @return LoginformEspaceMembre[] Returns an array of LoginformEspaceMembre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LoginformEspaceMembre
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
