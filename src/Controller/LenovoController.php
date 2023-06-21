<?php

declare(strict_types = 1);


namespace App\Controller;

use App\DTO\Transformer\LenovoResponseDtoTransformers;
use App\Entity\Lenovo;
use App\Services\LenovoService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use FOS\RestBundle\Controller\Annotations as Rest;


 /**
 * @Route("/api", name="api_")
 */
class LenovoController extends AbstractApiController
{
    private $orderService;

    public function __construct(LenovoService $orderService) {
        $this->orderService = $orderService;
    }

    /**
     * @Rest\Get("/order", name="app_order")
     * @Rest\View(serializerGroups={"read:Lenovo"})
     */
    public function index(LenovoResponseDtoTransformers $orderdto, EntityManagerInterface $managers)
    {

        $emOrd = $managers->getRepository(Lenovo::class);
        try {
            //code...
            ($emOrd->findBy(['id' => 1]));
        } catch (\Throwable $th) {
            dd($th);
        }
        $aLenovos = $this->orderService->findAllLenovos();
        $aLenovo = reset($aLenovos);
        $order = $orderdto->transformFromObject($aLenovo);

        // return $this->respond($order);
        // return new JsonResponse($order);

        return $order;
    }
}
