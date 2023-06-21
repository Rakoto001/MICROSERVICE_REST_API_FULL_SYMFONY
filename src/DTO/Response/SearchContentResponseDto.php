<?php

namespace App\DTO\Response;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

use Symfony\Component\Validator\Constraints as Assert;

class SearchContentResponseDto
{

  // "resultats" : {
  //   "reference" ou "uuid"
  //   "marque" : "",
  //   "modele": "",
  //   "boiteDeVitesse",
  //   "nombrePlace"
  //   "miseEnCirculation",
  //   "km": ,
  //   "photos",
  //   "prix",
  //   "",

  const SELLER_TYPE = [
    'amator' => 'amateur',
    'pro' => 'professionnel'
  ];
 
  public string $reference;
  public string $marque;
  public string $modele;
  public array $boiteDeVitesse;
  public int $nombrePlace;
  public DateTime $miseEnCirculation;
  public string $km;
  public string $photos;
  public int $prix;
  public string $vendeur;
  
  public function __construct() {
    $this->nombrePlace = 0;
    $this->km = 0;
    $this->vendeur = SearchContentResponseDto::SELLER_TYPE['amator'];
  }

}