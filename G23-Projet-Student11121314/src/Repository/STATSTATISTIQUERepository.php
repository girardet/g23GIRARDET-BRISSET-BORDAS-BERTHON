<?php

namespace App\Repository;

use App\Entity\STATSTATISTIQUE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method STATSTATISTIQUE|null find($id, $lockMode = null, $lockVersion = null)
 * @method STATSTATISTIQUE|null findOneBy(array $criteria, array $orderBy = null)
 * @method STATSTATISTIQUE[]    findAll()
 * @method STATSTATISTIQUE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class STATSTATISTIQUERepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, STATSTATISTIQUE::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('s')
            ->where('s.something = :value')->setParameter('value', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
