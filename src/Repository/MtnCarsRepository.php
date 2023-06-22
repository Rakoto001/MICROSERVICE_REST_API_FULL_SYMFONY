<?php

namespace App\Repository;

use App\Entity\MtnCars;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MtnCars>
 *
 * @method MtnCars|null find($id, $lockMode = null, $lockVersion = null)
 * @method MtnCars|null findOneBy(array $criteria, array $orderBy = null)
 * @method MtnCars[]    findAll()
 * @method MtnCars[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MtnCarsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MtnCars::class);
    }

    public function add(MtnCars $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MtnCars $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function createeQuery()
    {
        return $this->createQueryBuilder('m');
    }



    public function findCarsByFilterParametters($oRFilters)
    {
        // dd($oRFilters);
    //    $query = $this->createQueryBuilder('m');
           $results = $this->createeQuery()
                            ->where('m.marque = :marque')
                            ->andWhere('m.modele = :modele')
                            ->andWhere('m.energievoiture = :energie')
                            // ->andWhere('m.energieVoiture = :energie') nombredekmvoiture
                            ->andWhere('m.boitedevitessevoiture IN (:bvitesse)')
                            ->andWhere('m.nombredekmvoiture > :km') // https://stackoverflow.com/questions/37243028/doctrine-2-simple-bigger-than-criteria

                            ->setParameter('marque', strtolower($oRFilters->getMarque()))
                            ->setParameter('modele', strtolower($oRFilters->getModele()))
                            ->setParameter('energie', strtolower($oRFilters->getEnergie()))
                            ->setParameter('bvitesse', ($oRFilters->getBoiteVitesse()))
                            ->setParameter('km', ($oRFilters->getKm()))

                            ->getQuery()
                            ->getResult();

                            dump(count($results));

             dd(current($results));
    }

//    /**
//     * @return MtnCars[] Returns an array of MtnCars objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MtnCars
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
