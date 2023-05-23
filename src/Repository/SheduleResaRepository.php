<?php

namespace App\Repository;

use App\Entity\Shedule;
use App\Entity\SheduleResa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SheduleResa>
 *
 * @method SheduleResa|null find($id, $lockMode = null, $lockVersion = null)
 * @method SheduleResa|null findOneBy(array $criteria, array $orderBy = null)
 * @method SheduleResa[]    findAll()
 * @method SheduleResa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SheduleResaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SheduleResa::class);
    }

    public function save(SheduleResa $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SheduleResa $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }





//    /**
//     * @return SheduleResa[] Returns an array of SheduleResa objects
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

//    public function findOneBySomeField($value): ?SheduleResa
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
