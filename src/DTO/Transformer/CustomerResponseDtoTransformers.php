<?php

declare(strict_types = 1);


namespace App\DTO\Transformer;

use App\DTO\Response\CustomersResponseDto;
use App\DTO\Transformer\AbstractResponseDtoTransformers;
use App\Entity\Customer;

class CustomerResponseDtoTransformers extends AbstractResponseDtoTransformers
{

    // // public function transformFromObject($object)
    // // {

    // // }
    // public function transformFromObjects(iterable $objects) :iterable
    // {
    //     $dto = [];

    //     foreach ($objects as $key => $object) {
    //         $dto[] = $this->transformFromObject($object);
    //     }
    //     return $dto;

    // }
    
    /**
     * Undocumented function
     *
     * @param Customer $customer
     * @return void
     */
    public function transformFromObject($customer) :CustomersResponseDto
    {
        $dtoCustomer = new CustomersResponseDto;
        $dtoCustomer->email = $customer->getEmail();
        $dtoCustomer->phoneNumber = (string)$customer->getPhoneNumber();

        return $dtoCustomer;
    }

}