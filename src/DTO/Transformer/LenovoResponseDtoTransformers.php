<?php

declare(strict_types = 1);


namespace App\DTO\Transformer;

use App\Entity\Lenovo;
use App\DTO\Response\LenovosResponseDto;
use App\DTO\Transformer\AbstractResponseDtoTransformers;

class LenovoResponseDtoTransformers extends AbstractResponseDtoTransformers
{

    private $customerDtotransformer;
    private $productDtotransformer;
    public function __construct(CustomerResponseDtoTransformers $customerDtotransformer, ProductResponseDtoTransformers $productDtotransformer) {
        $this->customerDtotransformer = $customerDtotransformer;
        $this->productDtotransformer = $productDtotransformer;
    }
    
    /**
     *
     * @param Lenovo $order
     * @return LenovosResponseDto
     */
    public function transformFromObject($order) :LenovosResponseDto
    {
        $dtoLenovo = new LenovosResponseDto;
        // dd($order->getproduct()->getValues());

        // $dtoLenovo->createdAt = $order->getCreatedAt();
        $dtoLenovo->comment = $order->getComment();
        $dtoLenovo->customer = $this->customerDtotransformer->transformFromObject($order->getCustomer());
        $dtoLenovo->product = $this->productDtotransformer->transformFromObjects($order->getproduct()->getValues());

        dd($dtoLenovo);
      
        return $dtoLenovo;
    }

}