<?php

namespace App\Services\ORMService;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\DTO\Transformer\InputSearchTransformer\SearchFilterContentBodyDtoTransformers;

class BaseService
{
    private $manager;
    private $repos;
    private $sFCBody;

    public function __construct(EntityManagerInterface $manager, 
                                UserRepository $repos,
                                SearchFilterContentBodyDtoTransformers $sFCBody) {
        $this->manager = $manager;
        $this->repos = $repos;
        $this->sFCBody = $sFCBody;
    }

   public function formalizeInput($parametters)
   {
       $oInput = $this->sFCBody->transformSearchInputFilterObject($parametters["filtres"]["marque"], 
                                                                    $parametters["filtres"]["modele"], 
                                                                    $parametters["filtres"]["energie"], 
                                                                    $parametters["filtres"]["boiteVitesse"], 
                                                                    $parametters["filtres"]["km"],
                                                                    $parametters["filtres"]["dateSortie"]
                                                                );

       return $oInput;
   }

}