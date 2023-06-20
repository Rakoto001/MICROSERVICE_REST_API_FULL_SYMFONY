<?php

namespace App\Exception;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;

class FormException extends HttpException
{
    /**
     *
     * @var FormInterface
     */
    protected $form;

    public function __construct(FormInterface $form, int $statusCode = 400, ?string $message = '', \Throwable $previous = null, array $headers = [], ?int $code = 0)
    {
        parent::__construct($statusCode, $message, $previous, $headers,$code);

        $this->form = $form;
    }

    /**
     * @return FormInterface
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @return FormErrorIterator
     */
    public function getErrors()
    {
        return $this->form->getErrors(true);
    }
    

}