<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosAdress
 *
 * @ORM\Table(name="pos_adress", indexes={@ORM\Index(name="IDX_8C75CAAB41085FAE", columns={"pos_id"}), @ORM\Index(name="IDX_8C75CAAB4DE7DC5C", columns={"adresse_id"})})
 * @ORM\Entity
 */
class PosAdress
{
    /**
     * @var int
     *
     * @ORM\Column(name="pos_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $posId;

    /**
     * @var int
     *
     * @ORM\Column(name="adresse_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $adresseId;

    public function getPosId(): ?int
    {
        return $this->posId;
    }

    public function getAdresseId(): ?int
    {
        return $this->adresseId;
    }


}
