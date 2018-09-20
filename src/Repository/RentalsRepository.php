<?php

namespace App\Repository;

use App\Entity\Rentals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Rentals|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rentals|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rentals[]    findAll()
 * @method Rentals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RentalsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Rentals::class);
    }

//    /**
//     * @return Rentals[] Returns an array of Rentals objects
//     */
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
    public function findOneBySomeField($value): ?Rentals
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
