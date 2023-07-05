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
use App\Entity\MatrixCars;
use App\Services\ORMService\MatrixCarsService;

/**
 * @Route("/api", name="api_")
 */
class CarSearchApiController extends AbstractApiController
{
    private $rSResponse;
    private $baseService;
    private $mtnService;
    private $matrixService;

    public function __construct(ResultSearchResponseDtoTransformer $rSResponse,
                                BaseService $baseService,
                                MtnCarsService $mtnService,
                                MatrixCarsService $matrixService
                                )
    {
        $this->rSResponse = $rSResponse;
        $this->baseService = $baseService;
        $this->mtnService = $mtnService;
        $this->matrixService = $matrixService;
    }

    /**
     * @Rest\Post("/cars/global/search", name="api_global_search_cars")
     * @Rest\View(serializerGroups={"api_global_search"})
     */
    public function globalSearch(Request $request, SearchBodyDtoTransformers $oType)
    {
        $oCars = [];
        $oAllOutputCars = [];
        
        $allInputParamsSearch = $request->request->all();
        $oInputSearch = $this->baseService->formalizeInput($allInputParamsSearch);

        // Recherche pour MtnCars
        $oMtnOutSearch = $this->mtnService->makeSearchByFilterParametters($oInputSearch);

        // Recherche pour MatrixCars
        $oMatrixOutSearch = $this->matrixService->makeSearchByFilterParametters($oInputSearch);

        array_push($oAllOutputCars, ($oMatrixOutSearch), current($oMtnOutSearch));
        // dd($oAllOutputCars);

        // recherche par filtre oMtnOutSearch
        // $oCars = $this->rSResponse->transformResultSearchResponseObject($oMtnOutSearch);
        $oCars = $this->rSResponse->transformResultSearchResponseObject($oAllOutputCars);

        return $oCars;
        // return new JSONResponse($oCars);
    }


    /**
     * @Rest\Get("/cars/details/{reference}", name="api_cars_details")
     * @Rest\View()
     */
    public function carDetails(string $reference)
    {
        // meth get
        //  rech par reference 
        // si meme ref affiche les deux
        //  params get reference
        //  params retour => même retour que globalSearch
        // rturn view

        // $oMtnOutSearch = $this->mtnService->makeSearchByReference($reference);

        // Recherche pour MatrixCars
        $oCombinedCarSearch = $this->baseService->makeSearchByReference($reference, 'MatrixCars');
        $oCars = $this->rSResponse->transformResultSearchResponseObject($oCombinedCarSearch);

        return $oCars;

    }
}
