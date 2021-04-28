<?php

namespace App\Repository;

use App\Entity\RegistroVisualizacao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RegistroVisualizacao|null find($id, $lockMode = null, $lockVersion = null)
 * @method RegistroVisualizacao|null findOneBy(array $criteria, array $orderBy = null)
 * @method RegistroVisualizacao[]    findAll()
 * @method RegistroVisualizacao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegistroVisualizacaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RegistroVisualizacao::class);
    }

    // /**
    //  * @return RegistroVisualizacao[] Returns an array of RegistroVisualizacao objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RegistroVisualizacao
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
