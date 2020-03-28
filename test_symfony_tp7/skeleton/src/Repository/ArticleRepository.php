<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }
    
    public function findLast($count) {
        $qb = $this
            ->createQueryBuilder('article')
            ->orderBy('article.createdAt', 'DESC')
            ->setMaxResults($count);
        
        return $qb
            ->getQuery()
            ->getResult()
            ;
    }
    
    public function findAllPagine($page, $count) {
        $qb = $this->createQueryBuilder('article')
            ->orderBy('article.createdAt', 'DESC');
    
        $query = $qb->getQuery();
    
        $premierResultat = ($page - 1) * $count;
        $query->setFirstResult($premierResultat)->setMaxResults($count);
        $paginator = new Paginator($query);
        
        return $paginator;
    }
    
    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
