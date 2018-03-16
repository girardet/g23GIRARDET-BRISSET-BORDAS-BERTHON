<?php

namespace App\Repository;

use App\Entity\TypeProbleme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeProbleme|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeProbleme|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeProbleme[]    findAll()
 * @method TypeProbleme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeProblemeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeProbleme::class);
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
