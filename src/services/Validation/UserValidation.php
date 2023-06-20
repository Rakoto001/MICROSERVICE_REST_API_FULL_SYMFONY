<?php

namespace App\Services\Validation;

use App\Entity\User;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Response;



class UserValidation
{

    private $validator;

    public function __construct(ValidatorInterface $validator) {
        $this->validator = $validator;
    }

    public function validateInputUserRegistration(User $user)
    {
        $errors = $this->validator->validate($user);

        if (count($errors) > 0) {
            
            $errorsString = (string) $errors;

            return $errorsString;
    
        }

        return $user;
    }

}
