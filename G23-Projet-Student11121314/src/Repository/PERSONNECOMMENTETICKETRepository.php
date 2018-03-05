<?php

namespace App\Repository;

use App\Entity\PERSONNECOMMENTETICKET;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PERSONNECOMMENTETICKET|null find($id, $lockMode = null, $lockVersion = null)
 * @method PERSONNECOMMENTETICKET|null findOneBy(array $criteria, array $orderBy = null)
 * @method PERSONNECOMMENTETICKET[]    findAll()
 * @method PERSONNECOMMENTETICKET[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PERSONNECOMMENTETICKETRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PERSONNECOMMENTETICKET::class);
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
