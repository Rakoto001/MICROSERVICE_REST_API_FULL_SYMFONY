<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class AbstractApiController extends AbstractFOSRestController
{
  
    protected function respond($data): Response
    {
        
        $view = $this->view($data, 200);

        return $this->handleView($view);
        // return $this->render('abstract_api/index.html.twig', [
        //     'controller_name' => 'AbstractApiController',
        // ]);
    }
}
