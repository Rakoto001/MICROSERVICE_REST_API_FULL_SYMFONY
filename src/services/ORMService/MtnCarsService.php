<?php

namespace App\Services\ORMService;

use App\Entity\User;
use App\Repository\MtnCarsRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\DTO\RequestBodyParametters\RequestFilterContentBody;
use App\Entity\MtnCars;

class MtnCarsService
{
    private $manager;
    private $repos;

    public function __construct(EntityManagerInterface $manager, MtnCarsRepository $repos) {
        $this->manager = $manager;
        $this->repos = $repos;
    }
   

    // public function insertUser(User $user)
    // {
   
    //     $this->repos->add($user, true);

    //    return true;
        
    // }

    public function makeSearchByFilterParametters(RequestFilterContentBody $oRFilters)
    {

       $oCars = $this->repos->findCarsByFilterParametters($oRFilters);

       return $oCars;
    }

}