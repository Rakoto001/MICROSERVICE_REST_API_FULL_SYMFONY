<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    /**
     */
    public function onKernelException(ExceptionEvent  $event)
    {
        $request   = $event->getRequest();
        // dd($request);

    }

}