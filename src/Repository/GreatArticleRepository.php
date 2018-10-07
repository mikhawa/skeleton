<?php

namespace App\Repository;

use App\Entity\GreatArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GreatArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method GreatArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method GreatArticle[]    findAll()
 * @method GreatArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GreatArticleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GreatArticle::class);
    }

//    /**
//     * @return GreatArticle[] Returns an array of GreatArticle objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GreatArticle
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
