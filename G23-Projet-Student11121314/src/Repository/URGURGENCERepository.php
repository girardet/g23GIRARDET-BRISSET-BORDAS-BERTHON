<?php

namespace App\Repository;

use App\Entity\URGURGENCE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method URGURGENCE|null find($id, $lockMode = null, $lockVersion = null)
 * @method URGURGENCE|null findOneBy(array $criteria, array $orderBy = null)
 * @method URGURGENCE[]    findAll()
 * @method URGURGENCE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class URGURGENCERepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, URGURGENCE::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('u')
            ->where('u.something = :value')->setParameter('value', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
