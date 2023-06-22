<?php

namespace App\DTO\Transformer\ResultSearchResponseTransformer;

use App\DTO\Response\SearchResponseDto;
use App\DTO\Transformer\ResultSearchResponseTransformer\ResultSearchPropretiesResponseDtoTransformer;


class ResultSearchResponseDtoTransformer
{
    private $rSCResponse;
    private $rSCPropreties;

    public function __construct(ResultSearchContentResponseDtoTransformer $rSCResponse, 
                                ResultSearchPropretiesResponseDtoTransformer $rSCPropreties) {

        $this->rSCResponse = $rSCResponse;
        $this->rSCPropreties = $rSCPropreties;

    }

    public function transformResultSearchResponseObject($oCars) :SearchResponseDto
    {
        $oRSearch = new SearchResponseDto();

        $oRSearch->proprietes = $this->rSCPropreties->transformResultPropretiesSearchResponseObject($oCars);
        $oRSearch->resultats = $this->rSCResponse->transformAllResultContentSearchResponseObject($oCars);

        return $oRSearch;
    }

}