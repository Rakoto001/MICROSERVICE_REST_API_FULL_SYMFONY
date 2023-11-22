<?php

namespace App\DTO\Response;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

use Symfony\Component\Validator\Constraints as Assert;

class SearchProductContentResponseDto
{

  
  public function __construct() {
      
  }

    /**
     * @Serializer\Groups({"api_global_search"})
     */
    public string $nom;

    /**
     * @Serializer\Groups({"api_global_search"})
     */
    public string $prix;

    

}