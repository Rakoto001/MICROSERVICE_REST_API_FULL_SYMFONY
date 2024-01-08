<?php

namespace App\Exception;

use App\Exception\JsonExceptionResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class NotFoundException
{

    public function __construct(private $message, private $errors, private $statusCode) {
    }

    public function __invoke()
    {
        dd('dans inkove');

        return new JsonExceptionResponse($this->message, $this->errors, $this->statusCode);
    }
}
