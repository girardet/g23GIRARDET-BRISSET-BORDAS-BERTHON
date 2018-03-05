<?php

namespace App\Repository;

use App\Entity\MANUELPROCEDURE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MANUELPROCEDURE|null find($id, $lockMode = null, $lockVersion = null)
 * @method MANUELPROCEDURE|null findOneBy(array $criteria, array $orderBy = null)
 * @method MANUELPROCEDURE[]    findAll()
 * @method MANUELPROCEDURE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MANUELPROCEDURERepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MANUELPROCEDURE::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('m')
            ->where('m.something = :value')->setParameter('value', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
