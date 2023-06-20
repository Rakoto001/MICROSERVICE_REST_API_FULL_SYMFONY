<?php

declare(strict_types = 1);


namespace App\DTO\Transformer;

use App\DTO\Response\CustomersResponseDto;
use App\DTO\Response\UserResponseDto;
use App\DTO\Transformer\AbstractResponseDtoTransformers;
use App\Entity\Customer;

class UserResponseDtoTransformers extends AbstractResponseDtoTransformers
{

  
    
    /**
     * Undocumented function
     *
     * @param Customer $customer
     * @return void
     */
    public function transformFromObject($datas) :UserResponseDto
    {
        $dtoCustomer = new UserResponseDto;
        $dtoCustomer->email = $datas->getEmail();
        $dtoCustomer->role = $datas->getRoles();
        $dtoCustomer->password = $datas->getPassword();
        dd($dtoCustomer);

        return $dtoCustomer;
    }

}