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
use App\DTO\Transformer\OutputSearchResponseDto\OutputGlobalSearchResponse;
use App\DTO\Transformer\InputSearchTransformer\SearchTypeBodyDtoTransformers;
use App\DTO\Transformer\ResultSearchResponseTransformer\ResultSearchResponseDtoTransformer;
use App\Services\ORMService\BaseService;

/**
 * @Route("/api", name="api_")
 */
class CarSearchApiController extends AbstractApiController
{
    private $validator;
    private $rSResponse;
    private $baseService;

    public function __construct(OutputGlobalSearchResponse $rSResponse, BaseService $baseService)
    {
        $this->rSResponse = $rSResponse;
        $this->baseService = $baseService;
    }

    /**
     * @Rest\Post("/cars/global/search", name="api_global_search_cars")
     */
    public function globalSearch(Request $request, SearchTypeBodyDtoTransformers $oType)
    {
        $allInputParamsSearch = $request->request->all();
        $oInputSearch = $this->baseService->formalizeInput($allInputParamsSearch);
        dd($oInputSearch);
        $oOutSearch = $this->rSResponse->outputGlobalSearch();

        
        //  tsimaintsy mi return ciew zay vo mandeha le listener
    //  * @Rest\View(serializerGroups={"api_global_search"})
    //  return ($oOutSearch); 

                // "marque": "",
                // "modele": "",
                // "boiteVitesse": [""],
                // "km": 0,
                // "dateSortie": ""
        return new JSONResponse($oOutSearch);
    }
}
