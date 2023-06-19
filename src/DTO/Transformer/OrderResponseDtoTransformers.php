<?php

declare(strict_types = 1);


namespace App\DTO\Transformer;

use App\Entity\Order;
use App\DTO\Response\OrdersResponseDto;
use App\DTO\Transformer\AbstractResponseDtoTransformers;

class OrderResponseDtoTransformers extends AbstractResponseDtoTransformers
{

    private $customerDtotransformer;
    private $productDtotransformer;
    public function __construct(CustomerResponseDtoTransformers $customerDtotransformer, ProductResponseDtoTransformers $productDtotransformer) {
        $this->customerDtotransformer = $customerDtotransformer;
        $this->productDtotransformer = $productDtotransformer;
    }
    
    /**
     *
     * @param Order $order
     * @return OrdersResponseDto
     */
    public function transformFromObject($order) :OrdersResponseDto
    {
        $dtoOrder = new OrdersResponseDto;
        // dd($order->getproduct()->getValues());

        // $dtoOrder->createdAt = $order->getCreatedAt();
        $dtoOrder->comment = $order->getComment();
        $dtoOrder->customer = $this->customerDtotransformer->transformFromObject($order->getCustomer());
        $dtoOrder->product = $this->productDtotransformer->transformFromObjects($order->getproduct()->getValues());
      
        return $dtoOrder;
    }

}