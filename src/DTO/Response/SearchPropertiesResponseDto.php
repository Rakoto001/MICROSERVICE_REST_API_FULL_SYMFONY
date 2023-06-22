<?php

namespace App\DTO\Response;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

use Symfony\Component\Validator\Constraints as Assert;

class SearchPropertiesResponseDto
{

  public int $index;
  public int $nombreDePage;
  public int $total;
  public int $prixMax;
  public int $prixMin;

}