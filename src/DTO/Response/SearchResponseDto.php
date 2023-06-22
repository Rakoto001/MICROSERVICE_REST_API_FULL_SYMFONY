<?php

namespace App\DTO\Response;

use JMS\Serializer\Annotation as Serializer;

use App\DTO\Response\SearchContentResponseDto;
use Symfony\Component\Validator\Constraints as Assert;

class SearchResponseDto
{
  // type de sortie DTO en reponse a search global
  public $proprietes;
  public SearchContentResponseDto $resultats;

}