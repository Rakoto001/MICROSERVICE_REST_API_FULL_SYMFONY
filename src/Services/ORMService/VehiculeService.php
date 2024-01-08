<?php

namespace App\Services\ORMService;

use App\Entity\User;
use App\Entity\Vehicule;
use App\Repository\UserRepository;
use App\Exception\NotFoundException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class VehiculeService
{
    private $manager;
    private $repos;

    public function __construct(EntityManagerInterface $manager, UserRepository $repos) {
        $this->manager = $manager;
        $this->repos = $repos;
    }

    public function findOneByid(int $id)
    {
        $manager = $this->manager->getRepository(Vehicule::class);
        $oVehicule = $manager->findBy(['id' => $id]);

        if (count($oVehicule) <= 0) {
            throw new NotFoundException('Identifiant Inconnu', 'Erreur', 404);

        }
        
        
        return $oVehicule;

    }

}