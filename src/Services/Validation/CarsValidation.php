<?php

namespace App\Services\Validation;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class CarsValidation
{

    private $validator;

    public function __construct(ValidatorInterface $validator) {
        $this->validator = $validator;
    }

    public function isValidatedInputCarReference($reference) :bool
    {
        if (count($reference) <= 0) {
            return false;
        }

        return true;
    }

}
