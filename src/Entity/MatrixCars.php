<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MatrixCars
 *
 * @ORM\Table(name="matrix_cars", indexes={@ORM\Index(name="IDX_31A5A9C04A4A3511", columns={"vehicule_id"})})
 * @ORM\Entity
 */
class MatrixCars
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
     * @ORM\Column(name="pos_id", type="integer", nullable=true)
     */
    private $posId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="vehicule_id", type="integer", nullable=true)
     */
    private $vehiculeId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="offer_id", type="integer", nullable=true)
     */
    private $offerId;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=false)
     */
    private $reference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=0, nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publication_date", type="datetime", nullable=false)
     */
    private $publicationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modification_date", type="datetime", nullable=false)
     */
    private $modificationDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contact", type="string", length=255, nullable=true)
     */
    private $contact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="id_leaseway", type="string", length=25, nullable=false)
     */
    private $idLeaseway;

    /**
     * @var string
     *
     * @ORM\Column(name="brand_index", type="string", length=255, nullable=false)
     */
    private $brandIndex;

    /**
     * @var string
     *
     * @ORM\Column(name="model_index", type="string", length=255, nullable=false)
     */
    private $modelIndex;

    /**
     * @var string|null
     *
     * @ORM\Column(name="search_url", type="string", length=255, nullable=true)
     */
    private $searchUrl;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="first_hand", type="boolean", nullable=true)
     */
    private $firstHand;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fiscal_power", type="integer", nullable=true)
     */
    private $fiscalPower;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cylinder", type="integer", nullable=true)
     */
    private $cylinder;

    /**
     * @var int|null
     *
     * @ORM\Column(name="horse_power", type="integer", nullable=true)
     */
    private $horsePower;

    /**
     * @var int|null
     *
     * @ORM\Column(name="co2", type="integer", nullable=true)
     */
    private $co2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="seats", type="integer", nullable=true)
     */
    private $seats;

    /**
     * @var int|null
     *
     * @ORM\Column(name="doors", type="integer", nullable=true)
     */
    private $doors;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosId(): ?int
    {
        return $this->posId;
    }

    public function setPosId(?int $posId): self
    {
        $this->posId = $posId;

        return $this;
    }

    public function getVehiculeId(): ?int
    {
        return $this->vehiculeId;
    }

    public function setVehiculeId(?int $vehiculeId): self
    {
        $this->vehiculeId = $vehiculeId;

        return $this;
    }

    public function getOfferId(): ?int
    {
        return $this->offerId;
    }

    public function setOfferId(?int $offerId): self
    {
        $this->offerId = $offerId;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(\DateTimeInterface $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    public function getModificationDate(): ?\DateTimeInterface
    {
        return $this->modificationDate;
    }

    public function setModificationDate(\DateTimeInterface $modificationDate): self
    {
        $this->modificationDate = $modificationDate;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getIdLeaseway(): ?string
    {
        return $this->idLeaseway;
    }

    public function setIdLeaseway(string $idLeaseway): self
    {
        $this->idLeaseway = $idLeaseway;

        return $this;
    }

    public function getBrandIndex(): ?string
    {
        return $this->brandIndex;
    }

    public function setBrandIndex(string $brandIndex): self
    {
        $this->brandIndex = $brandIndex;

        return $this;
    }

    public function getModelIndex(): ?string
    {
        return $this->modelIndex;
    }

    public function setModelIndex(string $modelIndex): self
    {
        $this->modelIndex = $modelIndex;

        return $this;
    }

    public function getSearchUrl(): ?string
    {
        return $this->searchUrl;
    }

    public function setSearchUrl(?string $searchUrl): self
    {
        $this->searchUrl = $searchUrl;

        return $this;
    }

    public function isFirstHand(): ?bool
    {
        return $this->firstHand;
    }

    public function setFirstHand(?bool $firstHand): self
    {
        $this->firstHand = $firstHand;

        return $this;
    }

    public function getFiscalPower(): ?int
    {
        return $this->fiscalPower;
    }

    public function setFiscalPower(?int $fiscalPower): self
    {
        $this->fiscalPower = $fiscalPower;

        return $this;
    }

    public function getCylinder(): ?int
    {
        return $this->cylinder;
    }

    public function setCylinder(?int $cylinder): self
    {
        $this->cylinder = $cylinder;

        return $this;
    }

    public function getHorsePower(): ?int
    {
        return $this->horsePower;
    }

    public function setHorsePower(?int $horsePower): self
    {
        $this->horsePower = $horsePower;

        return $this;
    }

    public function getCo2(): ?int
    {
        return $this->co2;
    }

    public function setCo2(?int $co2): self
    {
        $this->co2 = $co2;

        return $this;
    }

    public function getSeats(): ?int
    {
        return $this->seats;
    }

    public function setSeats(?int $seats): self
    {
        $this->seats = $seats;

        return $this;
    }

    public function getDoors(): ?int
    {
        return $this->doors;
    }

    public function setDoors(?int $doors): self
    {
        $this->doors = $doors;

        return $this;
    }


}
