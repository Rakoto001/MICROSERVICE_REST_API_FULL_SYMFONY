<?php

declare(strict_types = 1);


namespace App\Controller;

use App\Entity\User;
use App\Entity\Order;
use App\Form\UserType;
use App\Services\OrderService;
use App\DTO\Response\UserResponseDto;
use JMS\Serializer\SerializerInterface;

use Doctrine\ORM\EntityManagerInterface;
use App\Services\Validation\UserValidation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\DTO\Transformer\UserResponseDtoTransformers;
use App\DTO\Transformer\OrderResponseDtoTransformers;
use App\Services\ORMService\UserService;
use FOS\RestBundle\Controller\Annotations\RequestParam;

/**
 * @Route("/api", name="api_")
 */
class UserController extends AbstractApiController
{
    private $orderService;
    private $serializer;
    private $validator;
    private $userService;
    

    public function __construct(OrderService $orderService,
                                SerializerInterface $serializer,
                                UserValidation $validator,
                                UserService $userService) {
        $this->orderService = $orderService;
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->userService = $userService;
    }

    /**
     * @Rest\Post("/user/create", name="user_create")
     * @RequestParam(name="customerName", nullable=false)
     */
    public function userCreate(Request $request)
    {
        $user = new User();

        $params = $request->request->all();
        $user->setEmail($params['email']);
        $user->setRoles($params['role']);
        $user->setPassword($params['password']);
        $response = $this->validator->validateInputUserRegistration($user);

        if (!$response instanceof User) {

            return new Response($response);

        }

        $this->userService->insertUser($user);

        // $results = $userTransform->transformFromObject($user);
        return $this->respond($user, Response::HTTP_CREATED);

    }
}
