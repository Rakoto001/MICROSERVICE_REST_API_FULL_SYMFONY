<?php

declare(strict_types = 1);


namespace App\Controller;


use App\Entity\Produit;
use App\Repository\ProduitRepository;
use App\Services\ORMService\BaseService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\DTO\Transformer\ResultSearchResponseTransformer\ResultSearchProductResponseDtoTransformer;

/**
 * @Route("/api", name="api_")
 */
class ProductController extends AbstractApiController
{
    private $rSResponse;
    private $baseService;

    public function __construct(ResultSearchProductResponseDtoTransformer $rSResponse,
                                BaseService $baseService
                                )
    {
        $this->rSResponse = $rSResponse;
        $this->baseService = $baseService;
    }

    /**
     * @Rest\Get("/product/global", name="api_global_search_all")
     * @Rest\View(statusCode=200,
     * serializerGroups={"api_global_search"
     * })
     */
    public function globalSearchProduct(Request $request, ProduitRepository $produitRepository)
    {
        $oProducts = [];
        $oAllOutputCars = [];

        $oProducts = $produitRepository->findAll();
      
        $oProducts = $this->rSResponse->transformResultSearchResponseObject($oProducts);

        return $oProducts;
    }


    /**
     * @Rest\Get("/product/details/{id}", name="api_product_details")
     * @Rest\View()
     */
    public function productDetails(string $id)
    {
        $oProduct = $this->baseService->makeSearchById($id);
        $oProduct = $this->rSResponse->transformResultSearchResponseObject($oProduct);

        return $oProduct;

    }

    /**
     * @Rest\Post("/product/new", name="api_product_new")
     */
    public function newArticles(Request $request, EntityManagerInterface $entityManager)
    {
        $allParams = $request->request->all();
        $oProduct = new Produit();

        $oProduct->setNom($allParams['nom'])
                 ->setPrix($allParams['prix']);

        $entityManager->persist($oProduct);

        $entityManager->flush();


        return new Response('Produit sauvegardé');

    }


    /**
     * @Rest\Put("/product/edit/{id}", name="api_cars_edit")
     */
    public function editCars(Request $request, $id)
    {
        $allParams = $request->request->all();
        $matrixReference = $this->baseService->makeSearchById($id);

        dd($matrixReference);
    }
}
