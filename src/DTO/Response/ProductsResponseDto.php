<?php

namespace App\DTO\Response;

use JMS\Serializer\Annotation as Serializer;

class ProductsResponseDto
{

    /**
     * @Serializer\Type("string")
     * @Serializer\Groups({"read:Lenovo"})
     * 
     */
    public string $code;

    /**
     * @Serializer\Type("string")
     * @Serializer\Groups({"read:Lenovo"})
     */
    public string $title;

    /**
     * @Serializer\Type("int")
     * @Serializer\Groups({"read:Lenovo"})
     */
    public int $price;


}