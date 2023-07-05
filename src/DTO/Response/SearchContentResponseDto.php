<?php

namespace App\DTO\Response;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

use Symfony\Component\Validator\Constraints as Assert;

class SearchContentResponseDto
{

    const SELLER_TYPE = [
      'amator' => 'amateur',
      'pro' => 'professionnel'
    ];
  
    /**
     * @Serializer\Groups({"api_global_search"})
     */
    public string $reference;

    /**
     * @Serializer\Groups({"api_global_search"})
     */
    public string $marque;

    /**
     * @Serializer\Groups({"api_global_search"})
     */
    public string $modele;

    /**
     * @Serializer\Groups({"api_global_search"})
     */
    public string $boiteDeVitesse;

    /**
     * @Serializer\Groups({"api_global_search"})
     */
    public int $nombrePlace;

    /**
     * @Serializer\Groups({"api_global_search"})
     */
    public DateTime $miseEnCirculation;

    /**
     * @Serializer\Groups({"api_global_search"})
     */
    public string $km;

    /**
     * @Serializer\Groups({"api_global_search"})
     */
    public string $photos;

    /**
     * @Serializer\Groups({"api_global_search"})
     */
    public int $prix;

    /**
     * @Serializer\Groups({"api_global_search"})
     */
    public string $vendeur;
    
    public function __construct() {
      $this->nombrePlace = 0;
      $this->km = 0;
      $this->vendeur = SearchContentResponseDto::SELLER_TYPE['amator'];
    }

}