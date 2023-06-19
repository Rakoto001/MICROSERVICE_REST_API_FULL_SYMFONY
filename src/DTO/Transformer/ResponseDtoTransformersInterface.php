<?php

declare(strict_types = 1);


namespace App\DTO\Transformer;


interface ResponseDtoTransformersInterface
{

    public function transformFromObject($object);
    public function transformFromObjects(iterable $objects) :iterable;
}