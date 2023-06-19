<?php

namespace App\DTO\Response;

use App\DTO\Response\ProductsResponseDto;
use App\DTO\Response\CustomersResponseDto;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\Type;

class OrdersResponseDto
{

    /**
     * Serializer\Type("DateTime<'Y-m-d\TH:i:sP'>") 
     */
    // public string $createdAt;

    /**
     * @Serializer\Type("string")
     */
    public string $comment;
    
    /**
     * @Serializer\Type("App\DTO\Response\CustomersResponseDto")
     */
    public CustomersResponseDto $customer;

    /**
     * @Serializer\Type("array<App\DTO\Response\ProductSResponseDto>")
     */
    public array $product;



}