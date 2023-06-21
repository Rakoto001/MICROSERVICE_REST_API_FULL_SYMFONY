<?php

declare(strict_types = 1);


namespace App\Controller;

use App\Entity\User;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use FOS\RestBundle\Controller\Annotations as Rest;


/**
 * @Route("/api", name="api_")
 */
class CarSearchApiController extends AbstractApiController
{
    private $validator;
    private $userService;
    

    public function __construct( ) {
        
    }

    /**
     * @Rest\Post("/cars/global/search", name="api_global_search_cars")
     */
    public function globalSearch(Request $request)
    {
        dd('search');
       

    }
}
