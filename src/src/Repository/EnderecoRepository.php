<?php

namespace App\Repository;

use App\Entity\Endereco;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Endereco|null find($id, $lockMode = null, $lockVersion = null)
 * @method Endereco|null findOneBy(array $criteria, array $orderBy = null)
 * @method Endereco[]    findAll()
 * @method Endereco[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnderecoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Endereco::class);
    }

    // /**
    //  * @return Endereco[] Returns an array of Endereco objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Endereco
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
