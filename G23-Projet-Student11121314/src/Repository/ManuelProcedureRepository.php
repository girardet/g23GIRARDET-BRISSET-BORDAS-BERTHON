<?php

namespace App\Repository;

use App\Entity\ManuelProcedure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ManuelProcedure|null find($id, $lockMode = null, $lockVersion = null)
 * @method ManuelProcedure|null findOneBy(array $criteria, array $orderBy = null)
 * @method ManuelProcedure[]    findAll()
 * @method ManuelProcedure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManuelProcedureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ManuelProcedure::class);
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
