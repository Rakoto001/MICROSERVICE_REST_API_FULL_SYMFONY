<?php

declare(strict_types = 1);


namespace App\Controller;

use App\Entity\User;
use App\Entity\Order;
use App\Form\UserType;
use App\Services\OrderService;
use App\DTO\Response\UserResponseDto;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\DTO\Transformer\UserResponseDtoTransformers;
use App\DTO\Transformer\OrderResponseDtoTransformers;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * @Route("/api", name="api_")
 */
class UserController extends AbstractApiController
{
    private $orderService;
    private $serializer;

    public function __construct(OrderService $orderService, SerializerInterface $serializer) {
        $this->orderService = $orderService;
        $this->serializer = $serializer;
    }

    /**
     * @Rest\Post("/user/create", name="user_create")
     * @RequestParam(name="customerName", nullable=false)
     */
    public function userCreate(Request $request, UserResponseDtoTransformers $userTransform, EntityManagerInterface $manager)
    {
        $user = new User();
        $user->setEmail($request->request->all()['email']);

        $results = $userTransform->transformFromObject($user);

        // $requestPayload = $this->serializer->deserialize(
        //     $request->getContent(),
        //     UserResponseDto::class,
        //     'json',
        // );
       


dd('fin');
        dd($request->query->all());
        return new JsonResponse(200);
    }
}
