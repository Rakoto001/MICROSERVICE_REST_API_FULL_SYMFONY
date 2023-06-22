<?php

namespace App\DTO\RequestBodyParametters;

use DateTime;

class RequestFilterContentBody
{

    public string $marque;
    public string $modele;
    public string $energie;
    public array $boiteVitesse;
    public int $km;
    public DateTime $dateSortie;

    
    public function getMarque()
    {
        return $this->marque;
    }

    public function getModele()
    {
        return $this->modele;
    }

    public function getEnergie()
    {
        return $this->energie;
    }

    public function getBoiteVitesse()
    {
        return $this->boiteVitesse;
    }

    public function getKm()
    {
        return $this->km;
    }
    public
     function getDateSortie()
    {
        return $this->dateSortie;
    }

}