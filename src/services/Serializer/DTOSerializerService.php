<?php


namespace App\Services\Serializer;

use Symfony\Component\Serializer\SerializerInterface;

class DTOSerializerService implements SerializerInterface{


    public function serialize($data, string $format, array $context = []){
        dd($context);

    }

   
    public function deserialize($data, string $type, string $format, array $context = [])
    {

    }

}