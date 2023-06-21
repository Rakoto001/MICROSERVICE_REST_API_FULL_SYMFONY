<?php

namespace App\DTO\Transformer\OutputSearchResponseDto;

use App\DTO\Response\SearchContentResponseDto;
use App\DTO\RequestBodyParametters\RequestBody;

class OutputTypeGlobalSearchResponse
{

  public RequestBody $types;
  public SearchContentResponseDto $resultats;

}