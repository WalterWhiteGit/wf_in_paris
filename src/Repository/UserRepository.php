<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }


    public function findByUser($userId)
    {
        $results= $this->createQueryBuilder('u')
                       ->select('u.firstname','u.lastname','u.mail','u.username','u.sexe')
                       ->where('u.id= :id')
                       ->setParameter('id',$userId)
                       ->getQuery()
                       ->getSingleResult();
        return $results;

        ;
    }

}
