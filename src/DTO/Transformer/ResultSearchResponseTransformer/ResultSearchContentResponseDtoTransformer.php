<?php

namespace App\DTO\Transformer\ResultSearchResponseTransformer;

use App\DTO\Response\SearchResponseDto;
use App\DTO\Response\SearchContentResponseDto;
use DateTime;

class ResultSearchContentResponseDtoTransformer
{
    public function __construct() {
        // $this->var = $var;
    }

    public function transformResultContentSearchResponseObject()
    {
        $oRTypeSearch = new SearchContentResponseDto();
        
        $oRTypeSearch->marque = "Citroen";
        $oRTypeSearch->modele = "WWW";
        $oRTypeSearch->boiteDeVitesse = ["automatique", "manuelle"];
        $oRTypeSearch->miseEnCirculation = new DateTime();
        $oRTypeSearch->photos = "Citroen";
        $oRTypeSearch->prix = "300";

        return $oRTypeSearch;

        // $oRTypeSearch->nombrePlace = 3;
        // $oRTypeSearch->marque = "Citroen";
        // $oRTypeSearch->marque = "Citroen";
        // $oRTypeSearch->marque = "Citroen";


//         public string $reference;
//   public string $marque;
//   public string $modele;
//   public array $boiteDeVitesse;
//   public int $nombrePlace;
//   public DateTime $miseEnCirculation;
//   public string $km;
//   public string $photos;
//   public int $prix;
//   public string $vendeur;
  
//   public function __construct() {
//     $this->nombrePlace = null;
//     $this->km = 0;
//     $this->vendeur = SearchContentResponseDto::SELLER_TYPE['amator'];
//   }
    }

}