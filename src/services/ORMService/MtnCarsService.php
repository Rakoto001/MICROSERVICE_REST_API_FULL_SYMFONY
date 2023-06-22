<?php

namespace App\Services\ORMService;

use App\Entity\User;
use App\Entity\MtnCars;
use App\Repository\MtnCarsRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\DTO\RequestBodyParametters\RequestBody;
use App\DTO\RequestBodyParametters\RequestFilterContentBody;

class MtnCarsService
{
    private $manager;
    private $repos;

    public function __construct(EntityManagerInterface $manager, MtnCarsRepository $repos) {
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