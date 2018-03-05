<?php

namespace App\Repository;

use App\Entity\STASTATUT;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method STASTATUT|null find($id, $lockMode = null, $lockVersion = null)
 * @method STASTATUT|null findOneBy(array $criteria, array $orderBy = null)
 * @method STASTATUT[]    findAll()
 * @method STASTATUT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class STASTATUTRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, STASTATUT::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('s')
            ->where('s.something = :value')->setParameter('value', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
