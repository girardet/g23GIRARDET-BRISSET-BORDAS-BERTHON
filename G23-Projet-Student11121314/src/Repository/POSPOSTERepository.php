<?php

namespace App\Repository;

use App\Entity\POSPOSTE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method POSPOSTE|null find($id, $lockMode = null, $lockVersion = null)
 * @method POSPOSTE|null findOneBy(array $criteria, array $orderBy = null)
 * @method POSPOSTE[]    findAll()
 * @method POSPOSTE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class POSPOSTERepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, POSPOSTE::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('p')
            ->where('p.something = :value')->setParameter('value', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
