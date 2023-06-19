<?php

namespace App\DTO\Response;

use JMS\Serializer\Annotation as Serializer;

class ProductsResponseDto
{

    /**
     * @Serializer\Type("string")
     */
    public string $code;

      /**
     * @Serializer\Type("string")
     */
    public string $title;

    /**
     * @Serializer\Type("int")
     */
    public int $price;


}