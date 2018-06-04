<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PostRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Post::class);
    }


// Afficher tous les posts sauf le plus récent.
    public function findAllPost()
    {

        $results = $this->createQueryBuilder('p')
                        ->select('p.Title','p.Content','p.Image','p.Synopsis','c.country')
                        ->innerJoin('p.author','a')
                        ->innerJoin('p.category','c')
                        ->innerJoin('p.district','d')
                        ->setFirstResult(1)
                        ->orderBy('p.Created','Desc')
                        ->getQuery()
                        ->getResult()

        ;

        return $results;
    }

// Afficher le post le + récent.


    public function findLastPost ()
    {
        $results = $this->createQueryBuilder('p')
            ->select('p.Title','p.Created','p.Synopsis','p.Image','(d.name) AS quartier ','a.firstname','c.name','c.country')
            ->innerJoin('p.author','a')
            ->innerJoin('p.category','c')
            ->innerJoin('p.district','d')
            ->setMaxResults(1)
            ->orderBy('p.Created','Desc')
            ->getQuery()
            ->getResult()

        ;

        return $results;
    }
}
