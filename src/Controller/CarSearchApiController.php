<?php

declare(strict_types = 1);


namespace App\Controller;

use App\Entity\User;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use App\DTO\Transformer\InputSearchTransformer\SearchTypeBodyDtoTransformers;
use App\DTO\Transformer\ResultSearchResponseTransformer\ResultSearchResponseDtoTransformer;

/**
 * @Route("/api", name="api_")
 */
class CarSearchApiController extends AbstractApiController
{
    private $validator;
    private $rSResponse;

    public function __construct(ResultSearchResponseDtoTransformer $rSResponse)
    {
        $this->rSResponse = $rSResponse;
    }

    /**
     * @Rest\Post("/cars/global/search", name="api_global_search_cars")
     */
    public function globalSearch(Request $request, SearchTypeBodyDtoTransformers $oType)
    {
        $allInputParamsSearch = $request->request->all();

        // $oType = $oType->transformSearchInputTypeObject(); //transformSearchInputTypeObject
        $oType = $this->rSResponse->transformResultSearchResponseObject();

        
        //  tsimaintsy mi return ciew zay vo mandeha le listener
    //  * @Rest\View(serializerGroups={"api_global_search"})
    //  return ($oType); 
        return new JsonResponse($oType);
    }
}
