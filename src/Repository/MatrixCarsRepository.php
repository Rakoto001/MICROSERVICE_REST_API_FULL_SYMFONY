<?php

namespace App\Repository;

use DateTime;
use App\Entity\Energy;
use App\Entity\Vehicule;
use App\Entity\MatrixCars;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
ini_set('memory_limit', '-1');
/**
 * @extends ServiceEntityRepository<MatrixCars>
 *
 * @method MatrixCars|null find($id, $lockMode = null, $lockVersion = null)
 * @method MatrixCars|null findOneBy(array $criteria, array $orderBy = null)
 * @method MatrixCars[]    findAll()
 * @method MatrixCars[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatrixCarsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MatrixCars::class);
    }

    public function add(MatrixCars $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MatrixCars $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function createeQuery()
    {
        return $this->createQueryBuilder('x');
    }



    public function findCarsByFilterParametters($oRFilters)
    {
       
        $queries = $this->createeQuery();
        // 23 results
        /** old query sans resultats des table de jointure*/
        // $queries->innerJoin(Vehicule::class, 'v', 'WITH', 'v.id = x.vehiculeId')
        //          ->addSelect('v')
        //          ->innerJoin(Energy::class, 'e', 'WITH', 'e.id = v.energyId')
        //          ->addSelect('e');

        $queries->join('x.vehicule', 'v')
                ->addSelect('v')
                ->join('v.energy', 'e')
                ->addSelect('e');
                           
                            if ( $oRFilters->filtres->getMarque() ) {

                              $queries->where('x.brandIndex = :marque')
                                      ->setParameter('marque', strtolower($oRFilters->filtres->getMarque()));
                               
                            }
       
                           
                            if ( $oRFilters->filtres->getModele() ) {
                               
                                $queries->andWhere('x.modelIndex = :modele')
                                        ->setParameter('modele', strtolower($oRFilters->filtres->getModele()));
                                 
                            }

                            if ( $oRFilters->filtres->getEnergie() ) {
                                // $queries->join(Vehicule::class, 'v', 'WITH', 'v.id = x.vehiculeId')
                                // ->addSelect('v')
                                //         ->join(Energy::class, 'e', 'WITH', 'e.id = v.energyId')
                                // ->addSelect('e');
                                
                                $queries->andWhere('e.code LIKE :energie') // UTILISATION DE LIKE CAR LES DONNES EN BASE SONT NON UNIFORMES
                                        ->setParameter('energie', strtolower($oRFilters->filtres->getEnergie()));
                            }

                            if ( $oRFilters->filtres->getBoiteVitesse() ) {

                                $queries->andWhere('v.gearbox IN (:bvitesse)')
                                        ->setParameter('bvitesse', ($oRFilters->filtres->getBoiteVitesse()));
                            }

                            if ( $oRFilters->filtres->getKm() ) {

                                $queries->andWhere('v.kilometers >= :km')
                                        ->setParameter('km', ($oRFilters->filtres->getKm()));

                            }

                            if ( $oRFilters->filtres->getDateSortie() ) {

                                $queries->andWhere('x.publicationDate > :datesortie')
                                        ->setParameter('datesortie', ($oRFilters->filtres->getDateSortie()));
                                 
                            }
  

        $results = $queries->getQuery()->getResult();


        return $results;
    }

//    /**
//     * @return MatrixCars[] Returns an array of MatrixCars objects
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

//    public function findOneBySomeField($value): ?MatrixCars
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
