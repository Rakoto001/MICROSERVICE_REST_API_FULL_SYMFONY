<?php

namespace App\DTO\Response;


use JMS\Serializer\Annotation as Serializer;

class CustomersResponseDto
{

    /**
     * @Serializer\Type("string")
     * @Serializer\Groups({"app_customer", "read:Order"})
     */
    public string $email;

    /**
     * @Serializer\Type("int")
     * @Serializer\Groups({"app_customer", "read:Order"})
     */
    public string $phoneNumber;


}