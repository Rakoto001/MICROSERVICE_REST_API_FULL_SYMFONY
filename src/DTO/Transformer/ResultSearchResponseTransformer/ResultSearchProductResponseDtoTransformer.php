<?php

namespace App\DTO\Transformer\ResultSearchResponseTransformer;

use App\DTO\Response\SearchResponseDto;
use App\DTO\Response\SearchProductResponseDto;
use App\DTO\Response\SearchPropertiesResponseDto;
use App\DTO\Transformer\ResultSearchResponseTransformer\ResultSearchPropretiesResponseDtoTransformer;
use App\DTO\Transformer\ResultSearchResponseTransformer\ResultSearchProductContentResponseDtoTransformer;


class ResultSearchProductResponseDtoTransformer
{
    private $rSCResponse;
    private $rSCPropreties;

    public function __construct(ResultSearchProductContentResponseDtoTransformer $rSCResponse) {

        $this->rSCResponse = $rSCResponse;

    }

    public function transformResultSearchResponseObject($oProducts) :SearchProductResponseDto
    {
        $oRSearch = new SearchProductResponseDto();

        $oRSearch->resultats = $this->rSCResponse->transformAllResultContentSearchResponseObject($oProducts);

        return $oRSearch;
    }

}