<?php

namespace App\Repository;

use App\Entity\Topics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Topics>
 *
 * @method Topics|null find($id, $lockMode = null, $lockVersion = null)
 * @method Topics|null findOneBy(array $criteria, array $orderBy = null)
 * @method Topics[]    findAll()
 * @method Topics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TopicsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Topics::class);
    }

    //    /**
    //     * @return Topics[] Returns an array of Topics objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Topics
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    // Méthode pour effectuer une pagination (sans bundle)
    public function getPaginatedAlltopics(int $page, int $limit, $filtersCategories = null, $filtersExposures = null): array
    {
        $offset = (($page * $limit) - $limit);

        $query = $this->createQueryBuilder('r');

        if ($filtersCategories !== null) {
            $query->andWhere('r.category IN (:filtersCategories)')
                ->setParameter('filtersCategories', $filtersCategories);
        }

        if ($filtersExposures !== null) {
            $query->innerJoin('r.exposure', 'd')
                ->andWhere('d IN (:filtersExposures)')
                ->setParameter('filtersExposures', $filtersExposures);
        }

        $query->orderBy('r.category', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery();

        return $query->getQuery()->getResult();
    }

    public function countAlltopics($filtersCategories = null, $filtersExposures = null): int
    {
        $query = $this->createQueryBuilder('r')
            ->select('COUNT(r.id)');

            if ($filtersCategories !== null) {
                $query->andWhere('r.category IN (:filtersCategories)')
                    ->setParameter('filtersCategories', $filtersCategories);
            }

            if ($filtersExposures !== null) {
                $query->innerJoin('r.exposure', 'd')
                    ->andWhere('d IN (:filtersExposures)')
                    ->setParameter('filtersExposures', $filtersExposures);
            }

        return $query->getQuery()->getSingleScalarResult();
    }
}
