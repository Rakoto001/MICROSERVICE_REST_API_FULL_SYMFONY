<?php

namespace App\DTO\Transformer\ResultSearchResponseTransformer;

use App\DTO\Response\SearchResponseDto;


class ResultSearchResponseDtoTransformer
{
    private $rSCResponse;

    public function __construct(ResultSearchContentResponseDtoTransformer $rSCResponse) {

        $this->rSCResponse = $rSCResponse;

    }

    public function transformResultSearchResponseObject()
    {
        $oRSearch = new SearchResponseDto();
        $oRSearch->resultats = $this->rSCResponse->transformResultContentSearchResponseObject();

        return $oRSearch;
    }

}