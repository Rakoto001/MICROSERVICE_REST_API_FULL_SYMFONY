<?php

declare(strict_types = 1);


namespace App\DTO\Transformer\InputSearchTransformer;

use App\DTO\RequestBodyParametters\RequestFilterContentBody;
use DateTime;

class SearchFilterContentBodyDtoTransformers
{

    public function transformSearchInputFilterObject($parametters = null)
    {
        $oType = new RequestFilterContentBody();
        
    
        $oType->marque = "marque";
        $oType->modele = "modele"; 
        $oType->boiteVitesse = [""]; 
        $oType->km = 0; 
        $oType->dateSortie = new DateTime(); 

        return $oType;
    }

   

}