<?php

declare(strict_types = 1);


namespace App\Controller;

use App\DTO\Transformer\OrderResponseDtoTransformers;
use App\Entity\Order;
use App\Services\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use FOS\RestBundle\Controller\Annotations as Rest;


 /**
 * @Route("/api", name="api_")
 */
class OrderController extends AbstractApiController
{
    private $orderService;

    public function __construct(OrderService $orderService) {
        $this->orderService = $orderService;
    }

    /**
     * @Rest\Get("/order", name="app_order")
     * @Rest\View(serializerGroups={"read:Order"})
     */
    public function index(OrderResponseDtoTransformers $orderdto)
    {

        $aOrders = $this->orderService->findAllOrders();
        $aOrder = reset($aOrders);
        $order = $orderdto->transformFromObject($aOrder);

        // return $this->respond($order);
        // return new JsonResponse($order);

        return $order;
    }
}
