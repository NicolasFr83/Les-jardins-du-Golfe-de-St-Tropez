<?php

namespace App\Repository;

use App\Entity\Exposure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Exposure>
 *
 * @method Exposure|null find($id, $lockMode = null, $lockVersion = null)
 * @method Exposure|null findOneBy(array $criteria, array $orderBy = null)
 * @method Exposure[]    findAll()
 * @method Exposure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExposureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Exposure::class);
    }

    //    /**
    //     * @return Exposure[] Returns an array of Exposure objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Exposure
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
