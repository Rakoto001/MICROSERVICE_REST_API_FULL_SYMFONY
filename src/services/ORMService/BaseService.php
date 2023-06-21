<?php

namespace App\Services\ORMService;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class BaseService
{
    private $manager;
    private $repos;

    public function __construct(EntityManagerInterface $manager, UserRepository $repos) {
        $this->manager = $manager;
        $this->repos = $repos;
    }

   public function formalizeInput($parametters)
   {
    //    $oInput = new 
   }

}