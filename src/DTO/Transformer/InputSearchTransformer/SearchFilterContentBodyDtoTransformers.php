<?php

declare(strict_types = 1);


namespace App\DTO\Transformer\InputSearchTransformer;

use App\DTO\RequestBodyParametters\RequestFilterContentBody;
use DateTime;

class SearchFilterContentBodyDtoTransformers
{

    public function transformSearchInputFilterObject($marque = null, $modele = null, $energie = null, $boiteVitesse = null, $km =null, $dateSortie = null)
    {
        $oType = new RequestFilterContentBody();
    
        $oType->marque = $marque;
        $oType->modele = $modele; //energie
        $oType->energie = $energie; //energie
        $oType->boiteVitesse = $boiteVitesse; 
        $oType->km = $km; 
        $oType->dateSortie = $dateSortie instanceof DateTime ? $dateSortie : DateTime::createFromFormat('d/m/Y', '1/10/70');

        return $oType;
    }

   

}