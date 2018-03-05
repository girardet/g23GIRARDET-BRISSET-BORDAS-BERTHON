<?php

namespace App\Repository;

use App\Entity\PERSONNEATYPEPROBLEME;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PERSONNEATYPEPROBLEME|null find($id, $lockMode = null, $lockVersion = null)
 * @method PERSONNEATYPEPROBLEME|null findOneBy(array $criteria, array $orderBy = null)
 * @method PERSONNEATYPEPROBLEME[]    findAll()
 * @method PERSONNEATYPEPROBLEME[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PERSONNEATYPEPROBLEMERepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PERSONNEATYPEPROBLEME::class);
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
