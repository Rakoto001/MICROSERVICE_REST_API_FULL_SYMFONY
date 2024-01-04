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
use App\Entity\Produit;

class BaseService
{
    private $manager;
    private $repos;
    private $searchBody;
    const MTNCARS = "MTN";
    const MATRIXCARS = "MATRIX";

    public function __construct(EntityManagerInterface $manager, 
                                UserRepository $repos,
                                SearchBodyDtoTransformers $searchBody) {
        $this->manager = $manager;
        $this->repos = $repos;
        $this->searchBody = $searchBody;
    }



    public function makeSearchById(string $id) :array
    {
       $aResultSearch = [];
 
       $aResultSearch = $this->manager->getRepository(Produit::class)->findBy(['id' => $id]);
 
       return $aResultSearch;
       
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



   /**
    * prends la valeur de la référence
    *
    * @param string $combinedReference
    * @return integer
    */
   public function getReference(string $combinedReference): array
   {
      $combinedReference= explode('-', $combinedReference);

      return ['prefix' => current($combinedReference),
            'reference' => next($combinedReference)];
      
   }

   /**
    * recherche par référence de la voiture
    *
    * @param string $reference
    * @return array
    */
   public function makeSearchByReference(string $reference) :array
   {
      $raResultSearch = [];

      $aReference = $this->getReference($reference);

      if ($aReference['prefix'] === self::MTNCARS) {
         $raResultSearch = $this->manager->getRepository(MtnCars::class)->findBy(['reference' => $aReference['reference']]);
      } else if ($aReference['prefix'] === self::MATRIXCARS) {
         $raResultSearch = $this->manager->getRepository(MatrixCars::class)->findBy(['reference' => $aReference['reference']]);
      }

      return $raResultSearch;
      
   }

}