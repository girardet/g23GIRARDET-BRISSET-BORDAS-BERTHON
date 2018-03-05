<?php

namespace App\Repository;

use App\Entity\CHAMCHAMPS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CHAMCHAMPS|null find($id, $lockMode = null, $lockVersion = null)
 * @method CHAMCHAMPS|null findOneBy(array $criteria, array $orderBy = null)
 * @method CHAMCHAMPS[]    findAll()
 * @method CHAMCHAMPS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CHAMCHAMPSRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CHAMCHAMPS::class);
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
