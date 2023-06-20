<?php

namespace App\DTO\Response;

use JMS\Serializer\Annotation as Serializer;

use Symfony\Component\Validator\Constraints as Assert;

class UserResponseDto
{

    /**
     * @Assert\Email()
     * 
     */
    public string $email;

    /**
     * @Assert\NotBlank()
     */
    public array $role;

      /**
     * @Assert\NotBlank()
     */
    public string $password;



}