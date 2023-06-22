<?php

namespace App\DTO\Transformer\OutputSearchResponseDto;

use App\DTO\Transformer\InputSearchTransformer\SearchBodyDtoTransformers;
use App\DTO\Transformer\ResultSearchResponseTransformer\ResultSearchContentResponseDtoTransformer;

class OutputGlobalSearchResponse
{
    private $rSCResponseContent;
    private $contentBody;

    public function __construct(ResultSearchContentResponseDtoTransformer $rSCResponseContent,
                                SearchBodyDtoTransformers $contentBody) {

        $this->rSCResponseContent = $rSCResponseContent;
        $this->contentBody = $contentBody;

    }

    /**
     * sortie de larecherche globale
     *
     * @return void
     */
    public function outputGlobalSearch()
    {

        $oOutputSearch = new OutputTypeGlobalSearchResponse();

        $oOutputSearch->types = $this->contentBody->transformSearchInputObject();
        $oOutputSearch->resultats = $this->rSCResponseContent->transformResultContentSearchResponseObject();

        return $oOutputSearch;
    }

}