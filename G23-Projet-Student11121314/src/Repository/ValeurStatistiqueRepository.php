<?php

namespace App\Repository;

use App\Entity\ValeurStatistique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ValeurStatistique|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValeurStatistique|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValeurStatistique[]    findAll()
 * @method ValeurStatistique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValeurStatistiqueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ValeurStatistique::class);
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
