<?php

namespace App\Repository;

use App\Entity\PERSPERSONNE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PERSPERSONNE|null find($id, $lockMode = null, $lockVersion = null)
 * @method PERSPERSONNE|null findOneBy(array $criteria, array $orderBy = null)
 * @method PERSPERSONNE[]    findAll()
 * @method PERSPERSONNE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PERSPERSONNERepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PERSPERSONNE::class);
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
