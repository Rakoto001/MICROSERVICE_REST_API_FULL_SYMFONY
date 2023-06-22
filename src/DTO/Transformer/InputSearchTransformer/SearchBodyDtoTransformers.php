<?php

declare(strict_types = 1);


namespace App\DTO\Transformer\InputSearchTransformer;

use App\Entity\Customer;
use App\DTO\Response\CustomersResponseDto;
use App\DTO\RequestBodyParametters\RequestBody;
use App\DTO\Transformer\AbstractResponseDtoTransformers;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use App\DTO\Transformer\InputSearchTransformer\SearchTypeContentBodyDtoTransformers;
use App\DTO\Transformer\InputSearchTransformer\SearchFilterContentBodyDtoTransformers;

class SearchBodyDtoTransformers extends AbstractFOSRestController
{
    private $contentType;
    private $contentFilter;

    public function __construct(SearchTypeContentBodyDtoTransformers $contentType,
    SearchFilterContentBodyDtoTransformers $contentFilter) {
        $this->contentType = $contentType;
        $this->contentFilter = $contentFilter;
    }

    public function transformSearchInputObject(
        $marque = null, 
        $modele = null, 
        $energie = null, 
        $boiteVitesse = null, 
        $km =null, 
        $dateSortie = null,
        $index = null, 
        $typeVendeur = null, 
        $nombreResultats = null, 
        $ordre = null
    )
    {

        $oType = new RequestBody();
        
        $oType->types = $this->contentType->transformSearchInputTypeObject($index = null, $typeVendeur = null, $nombreResultats = null, $ordre = null);
        $oType->filtres = $this->contentFilter->transformSearchInputFilterObject($marque, $modele, $energie, $boiteVitesse, $km , $dateSortie); //transformSearchInputFilterObject

        return $oType;
    }



    

   

}