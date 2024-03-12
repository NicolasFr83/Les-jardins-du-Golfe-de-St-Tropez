<?php

namespace App\Repository;

use App\Entity\ServicesPage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ServicesPage>
 *
 * @method ServicesPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicesPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicesPage[]    findAll()
 * @method ServicesPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServicesPageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServicesPage::class);
    }

    //    /**
    //     * @return ServicesPage[] Returns an array of ServicesPage objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ServicesPage
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
