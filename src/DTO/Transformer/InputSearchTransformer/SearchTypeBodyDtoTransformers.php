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

class SearchTypeBodyDtoTransformers extends AbstractFOSRestController
{
    private $contentBody;
    private $filter;

    public function __construct(SearchTypeContentBodyDtoTransformers $contentBody,
    SearchFilterContentBodyDtoTransformers $filter) {
        $this->contentBody = $contentBody;
        $this->filter = $filter;
    }

    public function transformSearchInputTypeObject($parametters = null)
    {
        $oType = new RequestBody();
        
        $oType->types = $this->contentBody->transformSearchInputTypeObject();
        $oType->filtres = $this->filter->transformSearchInputFilterObject(); //transformSearchInputFilterObject

        return $oType;
    }

   

}