<?php

namespace App\Repository;

use App\Entity\OptAd;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OptAd|null find($id, $lockMode = null, $lockVersion = null)
 * @method OptAd|null findOneBy(array $criteria, array $orderBy = null)
 * @method OptAd[]    findAll()
 * @method OptAd[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptAdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OptAd::class);
    }
}
