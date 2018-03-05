<?php

namespace App\Repository;

use App\Entity\VALEURSTATISTIQUE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VALEURSTATISTIQUE|null find($id, $lockMode = null, $lockVersion = null)
 * @method VALEURSTATISTIQUE|null findOneBy(array $criteria, array $orderBy = null)
 * @method VALEURSTATISTIQUE[]    findAll()
 * @method VALEURSTATISTIQUE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VALEURSTATISTIQUERepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VALEURSTATISTIQUE::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('v')
            ->where('v.something = :value')->setParameter('value', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
