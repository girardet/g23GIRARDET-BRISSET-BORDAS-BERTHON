<?php

namespace App\Repository;

use App\Entity\Champs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Champs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Champs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Champs[]    findAll()
 * @method Champs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChampsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Champs::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.something = :value')->setParameter('value', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
