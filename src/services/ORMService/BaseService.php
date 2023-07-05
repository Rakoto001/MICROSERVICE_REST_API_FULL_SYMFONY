<?php

namespace App\Services\ORMService;

use DateTime;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\DTO\RequestBodyParametters\RequestBody;
use App\DTO\RequestBodyParametters\RequestFilterContentBody;
use App\DTO\Transformer\InputSearchTransformer\SearchBodyDtoTransformers;
use App\DTO\Transformer\InputSearchTransformer\SearchFilterContentBodyDtoTransformers;
use App\Entity\MatrixCars;
use App\Entity\MtnCars;

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
     * formalisation de input function
     *
     * @param [type] $parametters
     * @return RequestFilterContentBody
     */
   public function formalizeInput(array $parametters) :RequestBody
   {
    
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


       return $oInput;
   }

   public function makeSearchByReference(string $reference, $entityName) :array
   {
      $raResultSearch = [];

      $matrixReference = $this->manager->getRepository(MatrixCars::class)->findBy(['reference' => $reference]);
      $mtnReference = $this->manager->getRepository(MtnCars::class)->findBy(['reference' => $reference]);
      
      $raResultSearch = array_merge($matrixReference, $mtnReference);

      return $raResultSearch;
      
   }

}