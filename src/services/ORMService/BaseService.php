<?php

namespace App\Services\ORMService;

use DateTime;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\DTO\RequestBodyParametters\RequestBody;
use App\DTO\RequestBodyParametters\RequestFilterContentBody;
use App\DTO\Transformer\InputSearchTransformer\SearchBodyDtoTransformers;
use App\DTO\Transformer\InputSearchTransformer\SearchFilterContentBodyDtoTransformers;

class BaseService
{
    private $manager;
    private $repos;
    private $searchBody;

    public function __construct(EntityManagerInterface $manager, 
                                UserRepository $repos,
                                SearchBodyDtoTransformers $searchBody) {
        $this->manager = $manager;
        $this->repos = $repos;
        $this->searchBody = $searchBody;
    }

    /**
     * Undocumented function
     *
     * @param [type] $parametters
     * @return RequestFilterContentBody
     */
   public function formalizeInput(array $parametters) :RequestBody
   {
    //    dd(($parametters["filtres"]["marque"]));
    
       $dateSortieInput = $parametters["filtres"]["dateSortie"] ? DateTime::createFromFormat('d/m/Y', '1/10/'.$parametters["filtres"]["dateSortie"]) : "";

       $oInput = $this->searchBody->transformSearchInputObject($parametters["filtres"]["marque"], 
                                                                    $parametters["filtres"]["modele"], 
                                                                    $parametters["filtres"]["energie"], 
                                                                    $parametters["filtres"]["boiteVitesse"], 
                                                                    $parametters["filtres"]["km"],
                                                                    $dateSortieInput,
                                                                    $parametters["types"]["index"],
                                                                    $parametters["types"]["typeVendeur"],
                                                                    $parametters["types"]["nombreResultats"],
                                                                    $parametters["types"]["ordre"]

);
       // SearchBodyDtoTransformers
    //    $oInput = $this->sFCBody->transformSearchInputFilterObject($parametters["filtres"]["marque"], 
    //                                                                 $parametters["filtres"]["modele"], 
    //                                                                 $parametters["filtres"]["energie"], 
    //                                                                 $parametters["filtres"]["boiteVitesse"], 
    //                                                                 $parametters["filtres"]["km"],
    //                                                                 $dateSortieInput
    //                                                             );


       return $oInput;
   }

}