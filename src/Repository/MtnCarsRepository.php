<?php

namespace App\Repository;

use App\Entity\MtnCars;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
ini_set('memory_limit', '-1');
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
       
        $queries = $this->createeQuery();
                           
                          
                            // ->andWhere('m.nombredekmvoiture > :km'); // https://stackoverflow.com/questions/37243028/doctrine-2-simple-bigger-than-criteria
                           
                            if ( $oRFilters->getMarque() ) {

                              $queries->where('m.marque = :marque')
                                      ->setParameter('marque', strtolower($oRFilters->getMarque()));
                               
                            }
                           
                            if ( $oRFilters->getModele() ) {
                               
                                $queries->andWhere('m.modele = :modele')
                                        ->setParameter('modele', strtolower($oRFilters->getModele()));
                                 
                            }


                            if ( $oRFilters->getEnergie() ) {

                                $queries->andWhere('m.energievoiture = :energie')
                                        ->setParameter('energie', strtolower($oRFilters->getEnergie()));
                                 
                            }

                            if ( $oRFilters->getBoiteVitesse() ) {

                                $queries->andWhere('m.boitedevitessevoiture IN (:bvitesse)')
                                        ->setParameter('bvitesse', ($oRFilters->getBoiteVitesse()));
                                 
                            }

                            if ( $oRFilters->getKm() ) {

                                $queries->andWhere('m.nombredekmvoiture >= :km')
                                        ->setParameter('km', ($oRFilters->getKm()));
                                 
                            }

                            if ( $oRFilters->getDateSortie() ) {

                                $queries->andWhere('m.miseencirculation >= :datesortie')
                                        ->setParameter('datesortie', ($oRFilters->getDateSortie()));
                                 
                            }
  

        $results = $queries->getQuery()->getResult();

        return $results;
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
