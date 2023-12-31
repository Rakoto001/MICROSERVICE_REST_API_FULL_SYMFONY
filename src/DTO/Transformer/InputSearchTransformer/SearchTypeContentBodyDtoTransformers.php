<?php

declare(strict_types = 1);


namespace App\DTO\Transformer\InputSearchTransformer;

use App\Entity\Customer;
use App\DTO\Response\CustomersResponseDto;
use App\DTO\Transformer\AbstractResponseDtoTransformers;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use App\DTO\RequestBodyParametters\RequestTypeContentBody;

class SearchTypeContentBodyDtoTransformers extends AbstractFOSRestController
{

    /**
     * DTO transform pour les params type input
     *
     * @param [type] $parametters
     * @return RequestTypeContentBody
     */
    public function transformSearchInputTypeObject($index = null, $typeVendeur = null, $nombreResultats = null, $ordre = null) :RequestTypeContentBody
    {
        // public int $index;
        // public string $typeVendeur;
        // public int $nombreResultats;
        // public string $ordre;
        $oType = new RequestTypeContentBody();
        
        $oType->index = 1;
        $oType->typeVendeur = "amateur"; // ou pro
        $oType->ordre = "asc"; // par défaut ASC

        return $oType;
    }

   

}