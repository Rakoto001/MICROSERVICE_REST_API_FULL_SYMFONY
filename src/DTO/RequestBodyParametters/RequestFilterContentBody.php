<?php

namespace App\DTO\RequestBodyParametters;

use DateTime;

class RequestFilterContentBody
{

    public string $marque;
    public string $modele;
    public array $boiteVitesse;
    public int $km;
    public DateTime $dateSortie;

}