<?php

declare(strict_types = 1);


namespace App\Controller;

use App\Entity\User;

use App\Services\ORMService\BaseService;
use App\Services\ORMService\MtnCarsService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use App\DTO\Transformer\OutputSearchResponseDto\OutputGlobalSearchResponse;
use App\DTO\Transformer\InputSearchTransformer\SearchBodyDtoTransformers;
use App\DTO\Transformer\ResultSearchResponseTransformer\ResultSearchResponseDtoTransformer;

/**
 * @Route("/api", name="api_")
 */
class CarSearchApiController extends AbstractApiController
{
    private $rSResponse;
    private $baseService;
    private $mtnService;

    public function __construct(OutputGlobalSearchResponse $rSResponse, BaseService $baseService, MtnCarsService $mtnService)
    {
        $this->rSResponse = $rSResponse;
        $this->baseService = $baseService;
        $this->mtnService = $mtnService;
    }

    /**
     * @Rest\Post("/cars/global/search", name="api_global_search_cars")
     */
    public function globalSearch(Request $request, SearchBodyDtoTransformers $oType)
    {
        $oCars = [];
        
        $allInputParamsSearch = $request->request->all();
        $oInputSearch = $this->baseService->formalizeInput($allInputParamsSearch);

        $oCars = $this->mtnService->makeSearchByFilterParametters($oInputSearch);
dd(next($oCars));
        // recherche par filtre
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
