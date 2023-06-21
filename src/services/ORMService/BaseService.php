<?php

namespace App\Services\ORMService;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\DTO\RequestBodyParametters\RequestFilterContentBody;
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

    /**
     * Undocumented function
     *
     * @param [type] $parametters
     * @return RequestFilterContentBody
     */
   public function formalizeInput($parametters) :RequestFilterContentBody
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