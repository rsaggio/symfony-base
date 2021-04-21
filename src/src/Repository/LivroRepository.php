<?php


namespace App\Repository;


use App\Entity\Livro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LivroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livro::class);
    }

    public function save(Livro $livro)
    {
        $em = $this->getEntityManager();
        $em->beginTransaction();
        $em->persist($livro);
        $em->commit();
        $em->flush();
    }

    public function remove(Livro $livro)
    {
        $em = $this->getEntityManager();
        $em->beginTransaction();
        $em->remove($livro);
        $em->commit();
        $em->flush();
    }
}