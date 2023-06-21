<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MtnCars
 *
 * @ORM\Table(name="mtn_cars")
 * @ORM\Entity
 */
class MtnCars
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
     * @var string|null
     *
     * @ORM\Column(name="photoMiniature", type="string", length=255, nullable=true)
     */
    private $photominiature;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photos", type="text", length=0, nullable=true)
     */
    private $photos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="marque", type="string", length=125, nullable=true)
     */
    private $marque;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modele", type="string", length=125, nullable=true)
     */
    private $modele;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motorisationVoiture", type="string", length=255, nullable=true)
     */
    private $motorisationvoiture;

    /**
     * @var string
     *
     * @ORM\Column(name="energievoiture", type="string", length=125, nullable=false)
     */
    private $energievoiture;

    /**
     * @var string|null
     *
     * @ORM\Column(name="polluscore", type="string", length=255, nullable=true)
     */
    private $polluscore;

    /**
     * @var string
     *
     * @ORM\Column(name="boiteDeVitessevoiture", type="string", length=125, nullable=false)
     */
    private $boitedevitessevoiture;

    /**
     * @var string|null
     *
     * @ORM\Column(name="carosserie", type="string", length=125, nullable=true)
     */
    private $carosserie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="couleur", type="text", length=0, nullable=true)
     */
    private $couleur;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nombreDePortes", type="integer", nullable=true)
     */
    private $nombredeportes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nombreDePlacesVoiture", type="integer", nullable=true)
     */
    private $nombredeplacesvoiture;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codePostal", type="string", length=125, nullable=true)
     */
    private $codepostal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville", type="string", length=125, nullable=true)
     */
    private $ville;

    /**
     * @var int|null
     *
     * @ORM\Column(name="puissanceFiscale", type="integer", nullable=true)
     */
    private $puissancefiscale;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="miseEnCirculation", type="datetime", nullable=true)
     */
    private $miseencirculation;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreDeKmVoiture", type="integer", nullable=false)
     */
    private $nombredekmvoiture;

    /**
     * @var int|null
     *
     * @ORM\Column(name="prixVoiture", type="integer", nullable=true)
     */
    private $prixvoiture;

    /**
     * @var int|null
     *
     * @ORM\Column(name="prixMaif", type="integer", nullable=true)
     */
    private $prixmaif;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typeVendeur", type="string", length=125, nullable=true)
     */
    private $typevendeur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lienPartenaire", type="string", length=255, nullable=true)
     */
    private $lienpartenaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="equipements", type="text", length=0, nullable=true)
     */
    private $equipements;

    /**
     * @var string|null
     *
     * @ORM\Column(name="elementsRassurance", type="text", length=0, nullable=true)
     */
    private $elementsrassurance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotominiature(): ?string
    {
        return $this->photominiature;
    }

    public function setPhotominiature(?string $photominiature): self
    {
        $this->photominiature = $photominiature;

        return $this;
    }

    public function getPhotos(): ?string
    {
        return $this->photos;
    }

    public function setPhotos(?string $photos): self
    {
        $this->photos = $photos;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(?string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getMotorisationvoiture(): ?string
    {
        return $this->motorisationvoiture;
    }

    public function setMotorisationvoiture(?string $motorisationvoiture): self
    {
        $this->motorisationvoiture = $motorisationvoiture;

        return $this;
    }

    public function getEnergievoiture(): ?string
    {
        return $this->energievoiture;
    }

    public function setEnergievoiture(string $energievoiture): self
    {
        $this->energievoiture = $energievoiture;

        return $this;
    }

    public function getPolluscore(): ?string
    {
        return $this->polluscore;
    }

    public function setPolluscore(?string $polluscore): self
    {
        $this->polluscore = $polluscore;

        return $this;
    }

    public function getBoitedevitessevoiture(): ?string
    {
        return $this->boitedevitessevoiture;
    }

    public function setBoitedevitessevoiture(string $boitedevitessevoiture): self
    {
        $this->boitedevitessevoiture = $boitedevitessevoiture;

        return $this;
    }

    public function getCarosserie(): ?string
    {
        return $this->carosserie;
    }

    public function setCarosserie(?string $carosserie): self
    {
        $this->carosserie = $carosserie;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getNombredeportes(): ?int
    {
        return $this->nombredeportes;
    }

    public function setNombredeportes(?int $nombredeportes): self
    {
        $this->nombredeportes = $nombredeportes;

        return $this;
    }

    public function getNombredeplacesvoiture(): ?int
    {
        return $this->nombredeplacesvoiture;
    }

    public function setNombredeplacesvoiture(?int $nombredeplacesvoiture): self
    {
        $this->nombredeplacesvoiture = $nombredeplacesvoiture;

        return $this;
    }

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(?string $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPuissancefiscale(): ?int
    {
        return $this->puissancefiscale;
    }

    public function setPuissancefiscale(?int $puissancefiscale): self
    {
        $this->puissancefiscale = $puissancefiscale;

        return $this;
    }

    public function getMiseencirculation(): ?\DateTimeInterface
    {
        return $this->miseencirculation;
    }

    public function setMiseencirculation(?\DateTimeInterface $miseencirculation): self
    {
        $this->miseencirculation = $miseencirculation;

        return $this;
    }

    public function getNombredekmvoiture(): ?int
    {
        return $this->nombredekmvoiture;
    }

    public function setNombredekmvoiture(int $nombredekmvoiture): self
    {
        $this->nombredekmvoiture = $nombredekmvoiture;

        return $this;
    }

    public function getPrixvoiture(): ?int
    {
        return $this->prixvoiture;
    }

    public function setPrixvoiture(?int $prixvoiture): self
    {
        $this->prixvoiture = $prixvoiture;

        return $this;
    }

    public function getPrixmaif(): ?int
    {
        return $this->prixmaif;
    }

    public function setPrixmaif(?int $prixmaif): self
    {
        $this->prixmaif = $prixmaif;

        return $this;
    }

    public function getTypevendeur(): ?string
    {
        return $this->typevendeur;
    }

    public function setTypevendeur(?string $typevendeur): self
    {
        $this->typevendeur = $typevendeur;

        return $this;
    }

    public function getLienpartenaire(): ?string
    {
        return $this->lienpartenaire;
    }

    public function setLienpartenaire(?string $lienpartenaire): self
    {
        $this->lienpartenaire = $lienpartenaire;

        return $this;
    }

    public function getEquipements(): ?string
    {
        return $this->equipements;
    }

    public function setEquipements(?string $equipements): self
    {
        $this->equipements = $equipements;

        return $this;
    }

    public function getElementsrassurance(): ?string
    {
        return $this->elementsrassurance;
    }

    public function setElementsrassurance(?string $elementsrassurance): self
    {
        $this->elementsrassurance = $elementsrassurance;

        return $this;
    }


}
