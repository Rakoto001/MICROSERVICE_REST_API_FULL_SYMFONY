<?php

declare(strict_types = 1);


namespace App\Controller;

use App\Entity\User;
use App\Entity\Lenovo;
use App\Form\UserType;
use App\Services\LenovoService;
use App\DTO\Response\UserResponseDto;
use JMS\Serializer\SerializerInterface;

use App\Services\ORMService\UserService;
use Doctrine\ORM\EntityManagerInterface;
use App\Services\Validation\UserValidation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\DTO\Transformer\UserResponseDtoTransformers;
use App\DTO\Transformer\LenovoResponseDtoTransformers;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @Route("/api", name="api_")
 */
class UserController extends AbstractApiController
{
    private $validator;
    private $userService;
    

    public function __construct( UserValidation $validator, UserService $userService) {

        $this->validator = $validator;
        $this->userService = $userService;
    }

    /**
     * @Rest\Post("/user/create", name="user_create")
     * @RequestParam(name="customerName", nullable=false)
     */
    public function userCreate(Request $request, UserPasswordHasherInterface $passwordHasher)
    {
        $user = new User();
        $params = $request->request->all();

        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $params['password']
        );

        $user->setEmail($params['email']);
        $user->setRoles($params['role']);
        $user->setUserName($params['userName']);
        $user->setPassword($hashedPassword);

       
        $user->setPassword($hashedPassword);
        $response = $this->validator->validateInputUserRegistration($user);

        if (!$response instanceof User) {

            return new Response($response);

        }

        $this->userService->insertUser($user);

        // $results = $userTransform->transformFromObject($user);
        return $this->respond($user, Response::HTTP_CREATED);

    }
}
