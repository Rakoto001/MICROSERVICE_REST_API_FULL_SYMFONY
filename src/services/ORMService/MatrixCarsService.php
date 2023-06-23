<?php

namespace App\Services\ORMService;

use App\Entity\MatrixCars;
use App\Repository\MatrixCarsRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\DTO\RequestBodyParametters\RequestBody;
use App\DTO\RequestBodyParametters\RequestFilterContentBody;

class MatrixCarsService
{
    private $manager;
    private $repos;

    public function __construct(EntityManagerInterface $manager, MatrixCarsRepository $repos) {
        $this->manager = $manager;
        $this->repos = $repos;
    }


    /**
     * recherche par le RequestBody filtre et type
     *
     * @param RequestBody $oRFilters
     * @return void
     */
    public function makeSearchByFilterParametters($oRFilters)
    {

       $oCars = $this->repos->findCarsByFilterParametters($oRFilters);

       return $oCars;
    }

}