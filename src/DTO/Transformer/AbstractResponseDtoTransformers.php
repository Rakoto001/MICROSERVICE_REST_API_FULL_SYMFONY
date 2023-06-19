<?php

declare(strict_types = 1);


namespace App\DTO\Transformer;


abstract class AbstractResponseDtoTransformers implements ResponseDtoTransformersInterface
{

    // public function transformFromObject($object)
    // {

    // }
    public function transformFromObjects(iterable $objects) :iterable
    {
        $dto = [];

        foreach ($objects as $key => $object) {
            $dto[] = $this->transformFromObject($object);
        }
        return $dto;

    }
    
    // public function transformFromObject($object)
    // {
    //     # code...
    // }

}