<?php

namespace App\DTO\Response;

use JMS\Serializer\Annotation as Serializer;

class ProductsResponseDto
{

    /**
     * @Serializer\Type("string")
     * @Serializer\Groups({"read:Order"})
     * 
     */
    public string $code;

    /**
     * @Serializer\Type("string")
     * @Serializer\Groups({"read:Order"})
     */
    public string $title;

    /**
     * @Serializer\Type("int")
     * @Serializer\Groups({"read:Order"})
     */
    public int $price;


}