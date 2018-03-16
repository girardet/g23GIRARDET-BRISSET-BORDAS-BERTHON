<?php

namespace App\Repository;

use App\Entity\PersonneATypeProbleme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PersonneATypeProbleme|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonneATypeProbleme|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonneATypeProbleme[]    findAll()
 * @method PersonneATypeProbleme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonneATypeProblemeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PersonneATypeProbleme::class);
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
