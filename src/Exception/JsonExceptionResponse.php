<?php

namespace App\Exception;

use App\Services\Http\ApiResponse;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class JsonExceptionResponse extends HttpException
{

    public function jsonExceptionResponse($message, $errors, $statusCode)
    {

        return new ApiResponse($message, null, $errors, $statusCode);
    }
}
