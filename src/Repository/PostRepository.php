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


    public function findAllPost()
    {

        $results = $this->createQueryBuilder('p')
                        ->select('p.Title','p.Created','p.Content','p.Image','(d.name) AS quartier ','a.firstname','c.name','c.country')
                        ->innerJoin('p.author','a')
                        ->innerJoin('p.category','c')
                        ->innerJoin('p.district','d')
                        ->orderBy('p.Created')
                        ->getQuery()
                        ->getResult()

        ;

        return $results;
    }
}
