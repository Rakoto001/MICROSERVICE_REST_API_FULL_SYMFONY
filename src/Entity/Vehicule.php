<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicule
 *
 * @ORM\Table(name="vehicule", indexes={@ORM\Index(name="IDX_292FFF1D44F5D008", columns={"brand_id"}), @ORM\Index(name="IDX_292FFF1D7975B7E7", columns={"model_id"}), @ORM\Index(name="IDX_292FFF1DEDDF52D", columns={"energy_id"})})
 * @ORM\Entity
 */
class Vehicule
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="brand_id", type="integer", nullable=true)
     */
    private $brandId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="model_id", type="integer", nullable=true)
     */
    private $modelId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="energy_id", type="integer", nullable=true)
     */
    private $energyId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255, nullable=false)
     */
    private $version;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer", nullable=false)
     */
    private $year;

    /**
     * @var int
     *
     * @ORM\Column(name="kilometers", type="integer", nullable=false)
     */
    private $kilometers;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @var string|null
     *
     * @ORM\Column(name="color2", type="string", length=255, nullable=true)
     */
    private $color2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="licence_plate", type="string", length=255, nullable=true)
     */
    private $licencePlate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gearbox", type="string", length=255, nullable=true)
     */
    private $gearbox;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dispo_date", type="datetime", nullable=false)
     */
    private $dispoDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrandId(): ?int
    {
        return $this->brandId;
    }

    public function setBrandId(?int $brandId): self
    {
        $this->brandId = $brandId;

        return $this;
    }

    public function getModelId(): ?int
    {
        return $this->modelId;
    }

    public function setModelId(?int $modelId): self
    {
        $this->modelId = $modelId;

        return $this;
    }

    public function getEnergyId(): ?int
    {
        return $this->energyId;
    }

    public function setEnergyId(?int $energyId): self
    {
        $this->energyId = $energyId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getKilometers(): ?int
    {
        return $this->kilometers;
    }

    public function setKilometers(int $kilometers): self
    {
        $this->kilometers = $kilometers;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getColor2(): ?string
    {
        return $this->color2;
    }

    public function setColor2(?string $color2): self
    {
        $this->color2 = $color2;

        return $this;
    }

    public function getLicencePlate(): ?string
    {
        return $this->licencePlate;
    }

    public function setLicencePlate(?string $licencePlate): self
    {
        $this->licencePlate = $licencePlate;

        return $this;
    }

    public function getGearbox(): ?string
    {
        return $this->gearbox;
    }

    public function setGearbox(?string $gearbox): self
    {
        $this->gearbox = $gearbox;

        return $this;
    }

    public function getDispoDate(): ?\DateTimeInterface
    {
        return $this->dispoDate;
    }

    public function setDispoDate(\DateTimeInterface $dispoDate): self
    {
        $this->dispoDate = $dispoDate;

        return $this;
    }


}
