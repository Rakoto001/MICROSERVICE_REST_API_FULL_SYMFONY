<?php

declare(strict_types = 1);


namespace App\Controller;

use App\DTO\Transformer\OrderResponseDtoTransformers;
use App\Entity\Order;
use App\services\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
     * @Route("/order", name="app_order")
     */
    public function index(OrderResponseDtoTransformers $orderdto): Response
    {

        $aOrders = $this->orderService->findAllOrders();
        $aOrder = reset($aOrders);
        $order = $orderdto->transformFromObject($aOrder);

        return $this->respond($order);
        // return new JsonResponse($order);
    }
}
