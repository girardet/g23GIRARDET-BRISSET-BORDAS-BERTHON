<?php

namespace App\Repository;

use App\Entity\TICKTICKETS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TICKTICKETS|null find($id, $lockMode = null, $lockVersion = null)
 * @method TICKTICKETS|null findOneBy(array $criteria, array $orderBy = null)
 * @method TICKTICKETS[]    findAll()
 * @method TICKTICKETS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TICKTICKETSRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TICKTICKETS::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('t')
            ->where('t.something = :value')->setParameter('value', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
