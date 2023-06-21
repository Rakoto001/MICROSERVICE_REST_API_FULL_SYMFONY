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

}