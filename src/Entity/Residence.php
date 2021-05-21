<?php

namespace App\Entity;

use App\Repository\ResidenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResidenceRepository::class)
 */
class Residence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $superficie;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre_pieces;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $adresse;

    /**
     * @ORM\Column(type="boolean")
     */
    private $piscine;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isExterieur;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2, nullable=true)
     */
    private $surface_exterieur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isGarage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVenteOrLocation;

    /**
     * @ORM\Column(type="decimal", precision=11, scale=2)
     */
    private $prix;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_parution;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSuperficie(): ?string
    {
        return $this->superficie;
    }

    public function setSuperficie(string $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getNombrePieces(): ?int
    {
        return $this->nombre_pieces;
    }

    public function setNombrePieces(int $nombre_pieces): self
    {
        $this->nombre_pieces = $nombre_pieces;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPiscine(): ?bool
    {
        return $this->piscine;
    }

    public function setPiscine(bool $piscine): self
    {
        $this->piscine = $piscine;

        return $this;
    }

    public function getIsExterieur(): ?bool
    {
        return $this->isExterieur;
    }

    public function setIsExterieur(bool $isExterieur): self
    {
        $this->isExterieur = $isExterieur;

        return $this;
    }

    public function getSurfaceExterieur(): ?string
    {
        return $this->surface_exterieur;
    }

    public function setSurfaceExterieur(float $surface_exterieur): self
    {
        $this->surface_exterieur = $surface_exterieur;

        return $this;
    }

    public function getIsGarage(): ?bool
    {
        return $this->isGarage;
    }

    public function setIsGarage(bool $isGarage): self
    {
        $this->isGarage = $isGarage;

        return $this;
    }

    public function getIsVenteOrLocation(): ?bool
    {
        return $this->isVenteOrLocation;
    }

    public function setIsVenteOrLocation(bool $isVenteOrLocation): self
    {
        $this->isVenteOrLocation = $isVenteOrLocation;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDateParution(): ?\DateTimeInterface
    {
        return $this->date_parution;
    }

    public function setDateParution(\DateTimeInterface $date_parution): self
    {
        $this->date_parution = $date_parution;

        return $this;
    }
}
