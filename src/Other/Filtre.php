<?php


namespace App\Other;
use Symfony\Component\Validator\Constraints as Assert;


class Filtre
{

    //const RESIDENCE_TYPES = ["flat","house","yourte"];

    private $id;

    /**

     *  @Assert\Type(
     *     type="float",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )

     */
    private $superficie;

    /**
     *

     * * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )

     */
    private $nombre_pieces;

    /**

     * * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     *

     */
    private $type;

    /**

     * * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @Assert\Length(min=2, max=2000, minMessage="minimum 2 caracteres", maxMessage=" maximum 2000 ")

     */
    private $adresse;

    /**
     *

     * * @Assert\Type(
     *     type="bool",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )

     */
    private $piscine;

    /**

     * * @Assert\Type(
     *     type="bool",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )

     */
    private $isExterieur;

    /**
     * * @Assert\Type(
     *     type="float",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     *
     *
     */
    private $surface_exterieur;

    /**

     * * @Assert\Type(
     *     type="bool",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     *
     */
    private $isGarage;

    /**

     * * @Assert\Type(
     *     type="bool",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )

     */
    private $isVenteOrLocation;

    /**
     *
     * * @Assert\Type(
     *     type="float",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )

     */
    private $prix;

    /**
    
     *
     *
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

    public function setSuperficie(float $superficie): self
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

    public function setDateParution(?\DateTimeInterface $date_parution=null): self
    {
        $this->date_parution = $date_parution;

        return $this;
    }

}