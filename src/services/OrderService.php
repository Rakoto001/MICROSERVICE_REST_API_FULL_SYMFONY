<?php

namespace App\Services;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;

class OrderService
{
    private $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function getRepository()
    {
        
        return $this->em->getRepository(Order::class);
    }

    public function findAllOrders()
    {
        return $this->getRepository()->allFind();
    }

    

}