<?php

namespace App\DTO\Response;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

use Symfony\Component\Validator\Constraints as Assert;

class SearchPropertiesResponseDto
{

  /**
   * @Serializer\Groups({"api_global_search"})
   */
  public int $index;

  /**
   * @Serializer\Groups({"api_global_search"})
   */
  public int $nombreDePage;

  /**
   * @Serializer\Groups({"api_global_search"})
   */
  public int $total;

  /**
   * @Serializer\Groups({"api_global_search"})
   */
  public int $prixMax;

  /**
   * @Serializer\Groups({"api_global_search"})
   */
  public int $prixMin;

}