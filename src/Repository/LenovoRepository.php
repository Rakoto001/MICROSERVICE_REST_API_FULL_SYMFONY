<?php

namespace App\Repository;

use App\Entity\Lenovo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lenovo>
 *
 * @method Lenovo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lenovo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lenovo[]    findAll()
 * @method Lenovo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LenovoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lenovo::class);
    }

    public function add(Lenovo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Lenovo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }



    public function entityManager()
    {
        return $this->getEntityManager()->getConnection();
    }



    

    public function allFind($params = null)
    {

      
        $results = $this->createQueryBuilder('o')
                        ->join('o.product', 'p')
                        ->addSelect('p')
                        ->getQuery()
                        ->getResult();
        
        return $results;


    }



//    /**
//     * @return Lenovo[] Returns an array of Lenovo objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Lenovo
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
