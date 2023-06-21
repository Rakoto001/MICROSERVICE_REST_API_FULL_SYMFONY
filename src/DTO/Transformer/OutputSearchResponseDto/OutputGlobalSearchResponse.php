<?php

namespace App\DTO\Transformer\OutputSearchResponseDto;

use App\DTO\Transformer\InputSearchTransformer\SearchTypeBodyDtoTransformers;
use App\DTO\Transformer\ResultSearchResponseTransformer\ResultSearchContentResponseDtoTransformer;

class OutputGlobalSearchResponse
{
    private $rSCResponse;
    private $contentBody;

    public function __construct(ResultSearchContentResponseDtoTransformer $rSCResponse,
                                SearchTypeBodyDtoTransformers $contentBody) {

        $this->rSCResponse = $rSCResponse;
        $this->contentBody = $contentBody;

    }

    public function outputGlobalSearch()
    {

        $oOutputSearch = new OutputTypeGlobalSearchResponse();
        $oOutputSearch->types = $this->contentBody->transformSearchInputTypeObject();
        $oOutputSearch->resultats = $this->rSCResponse->transformResultContentSearchResponseObject();

        return $oOutputSearch;
    }

}