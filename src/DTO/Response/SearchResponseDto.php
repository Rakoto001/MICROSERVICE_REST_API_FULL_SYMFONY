<?php

namespace App\DTO\Response;

use JMS\Serializer\Annotation as Serializer;

use App\DTO\Response\SearchContentResponseDto;
use App\DTO\Response\SearchPropertiesResponseDto;
use Symfony\Component\Validator\Constraints as Assert;

class SearchResponseDto
{
  
  /**
   * @Serializer\Groups({"api_global_search"})
   */
  public SearchPropertiesResponseDto $proprietes;

  /**
   * @Serializer\Groups({"api_global_search"})
   */
  public array $resultats;

}