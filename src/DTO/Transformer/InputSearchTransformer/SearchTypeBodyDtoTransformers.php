<?php

declare(strict_types = 1);


namespace App\DTO\Transformer\InputSearchTransformer;

use App\Entity\Customer;
use App\DTO\Response\CustomersResponseDto;
use App\DTO\RequestBodyParametters\RequestTypeBody;
use App\DTO\Transformer\AbstractResponseDtoTransformers;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use App\DTO\Transformer\InputSearchTransformer\SearchTypeContentBodyDtoTransformers;

class SearchTypeBodyDtoTransformers extends AbstractFOSRestController
{
    private $contentBody;

    public function __construct(SearchTypeContentBodyDtoTransformers $contentBody) {
        $this->contentBody = $contentBody;
    }

    public function transformSearchInputTypeObject($parametters = null)
    {
        $oType = new RequestTypeBody();
        
        $oType->types = $this->contentBody->transformSearchInputTypeObject();
        $oType->comment = 'test commentaire';

        return $oType;
    }

   

}