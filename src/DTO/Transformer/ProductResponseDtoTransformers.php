<?php

declare(strict_types = 1);


namespace App\DTO\Transformer;

use App\Entity\Customer;
use App\DTO\Response\ProductsResponseDto;
use App\DTO\Transformer\AbstractResponseDtoTransformers;
use App\Entity\Product;

class ProductResponseDtoTransformers extends AbstractResponseDtoTransformers
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
     * @param Product $product
     * @return void
     */
    public function transformFromObject($product) :ProductsResponseDto
    {
        $dtoProduct = new ProductsResponseDto;
        $dtoProduct->code = $product->getCode();
        $dtoProduct->title = $product->getTitle();
        $dtoProduct->description = $product->getDescription();
        $dtoProduct->price = $product->getPrice();

        return $dtoProduct;
    }

}