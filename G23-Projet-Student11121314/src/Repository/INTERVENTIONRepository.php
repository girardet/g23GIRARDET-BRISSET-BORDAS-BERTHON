<?php

namespace App\Repository;

use App\Entity\INTERVENTION;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method INTERVENTION|null find($id, $lockMode = null, $lockVersion = null)
 * @method INTERVENTION|null findOneBy(array $criteria, array $orderBy = null)
 * @method INTERVENTION[]    findAll()
 * @method INTERVENTION[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class INTERVENTIONRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, INTERVENTION::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('i')
            ->where('i.something = :value')->setParameter('value', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
