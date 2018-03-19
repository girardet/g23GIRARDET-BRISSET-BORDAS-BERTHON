<?php

namespace App\Repository;

use App\Entity\CommenteTicket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CommenteTicket|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommenteTicket|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommenteTicket[]    findAll()
 * @method CommenteTicket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommenteTicketRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CommenteTicket::class);
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
