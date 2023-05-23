<?php

namespace App\Repository;

use App\Entity\Formule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Formule>
 *
 * @method Formule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Formule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Formule[]    findAll()
 * @method Formule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormuleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Formule::class);
    }

    public function save(Formule $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Formule $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Formule[] Returns an array of Formule objects
     */
    public function findByVisible($visible): array
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.visible = :visible')
            ->setParameter('visible', $visible)
            ->orderBy('f.menu', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

//    public function findOneBySomeField($value): ?Formule
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}