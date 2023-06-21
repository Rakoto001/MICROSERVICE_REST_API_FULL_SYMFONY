<?php

namespace App\DTO\Response;

use App\DTO\Response\ProductsResponseDto;
use App\DTO\Response\CustomersResponseDto;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;

class LenovosResponseDto
{

    /**
     * Serializer\Type("DateTime<'Y-m-d\TH:i:sP'>") 
     */
    // public string $createdAt;

    /**
     * @Serializer\Type("string")
     * @Serializer\Groups({"read:Lenovo"})
     * 
     */
    public string $comment;
    
    /**
     * @Serializer\Type("App\DTO\Response\CustomersResponseDto")
     * @Serializer\Groups({"read:Lenovo"})
     * 
     */
    public CustomersResponseDto $customer;

    /**
     * @Serializer\Type("array<App\DTO\Response\ProductSResponseDto>")
     * @Serializer\Groups({"read:Lenovo"})
     */
    public array $product;



}