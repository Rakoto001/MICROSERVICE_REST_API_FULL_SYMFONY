<?php

namespace App\Services;

use App\Entity\Lenovo;
use App\Repository\LenovoRepository;
use Doctrine\ORM\EntityManagerInterface;

class LenovoService
{
    private $em;

    public function __construct(LenovoRepository $em) {
        $this->em = $em;
    }

    public function getRepository()
    {
        
        return $this->em->getRepository(Lenovo::class);
    }

    public function findAllLenovos()
    {
        return $this->em->allFind();
    }

    

}