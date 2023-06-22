<?php

namespace App\DTO\Transformer\ResultSearchResponseTransformer;

use DateTime;
use App\DTO\Response\SearchResponseDto;
use App\DTO\Response\SearchContentResponseDto;
use App\DTO\Response\SearchPropertiesResponseDto;

class ResultSearchPropretiesResponseDtoTransformer
{
    public function __construct() {
        // $this->var = $var;
    }

    public function transformResultPropretiesSearchResponseObject($oCars) :SearchPropertiesResponseDto
    {
        // dd(next($oCars));

        $oPropretieSearch = new SearchPropertiesResponseDto();
        $oPropretieSearch->index = 1;
        $oPropretieSearch->nombreDePage = 50 ;
        $oPropretieSearch->total = 500;
        $oPropretieSearch->prixMax = 80000;
        $oPropretieSearch->prixMin = 1000;
        
       return $oPropretieSearch;
       
    }

}