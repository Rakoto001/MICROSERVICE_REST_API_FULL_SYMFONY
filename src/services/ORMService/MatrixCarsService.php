<?php

namespace App\Services\ORMService;

use App\Entity\MatrixCars;
use App\Repository\MatrixCarsRepository;
use App\Services\ORMService\BaseService;
use Doctrine\ORM\EntityManagerInterface;
use App\DTO\RequestBodyParametters\RequestBody;
use App\DTO\RequestBodyParametters\RequestFilterContentBody;
use App\Entity\Vehicule;

class MatrixCarsService extends BaseService
{
    private $manager;
    private $repos;

    public function __construct(EntityManagerInterface $manager, MatrixCarsRepository $repos,
                                private VehiculeService $vehiculeService) {
        $this->manager = $manager;
        $this->repos = $repos;
    }


    /**
     * recherche par le RequestBody filtre et type
     *
     * @param RequestBody $oRFilters
     * @return void
     */
    public function makeSearchByFilterParametters($oRFilters) :iterable
    {

       $oCars = $this->repos->findCarsByFilterParametters($oRFilters);

       return $oCars;
    }

    public function update(MatrixCars $oCar)
    {
        // $oVehicule = $this->vehiculeService->findOneByid($oCar->getVehicule()->getId());
        $oVehicule = $this->vehiculeService->findOneByid(7);
        // if ($oVehicule instanceof Vehicule) {

        // } 



        return false;


    }

  

}