<?php

namespace App\Repository;

use App\Entity\TYPTYPEPROBLEME;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TYPTYPEPROBLEME|null find($id, $lockMode = null, $lockVersion = null)
 * @method TYPTYPEPROBLEME|null findOneBy(array $criteria, array $orderBy = null)
 * @method TYPTYPEPROBLEME[]    findAll()
 * @method TYPTYPEPROBLEME[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TYPTYPEPROBLEMERepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TYPTYPEPROBLEME::class);
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
