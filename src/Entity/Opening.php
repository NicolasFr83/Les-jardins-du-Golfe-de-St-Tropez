<?php

namespace App\Entity;

use App\Repository\OpeningRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: OpeningRepository::class)]
class Opening
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(type: 'string', length: 10)]
    #[Assert\NotBlank(message: 'Veuillez renseigner un jour.')]
    #[Assert\Length(
        min: 5, max: 8,
        minMessage: 'Le jour doit contenir 2 caractères minimum.',
        maxMessage: "Le jour ne doit pas dépasser 8 caractères"
    )]
    private ?string $openingDay = null;

    #[ORM\Column(length:5)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures d\'ouverture  du l\'entreprise.')]
    #[Assert\Length(
        min: 5, max: 5,
        minMessage:'L\'heure d\'ouverture doit contenir 5 chiffres',
    )]
    private ?string $openingHourMorning = null;


    #[ORM\Column(length:5)]
    #[Assert\NotBlank(message: 'Veuillez renseigner l\'heure de fermeture.')]
    #[Assert\Length(
        min: 5, max: 5,
        minMessage:'L\'heure de fermeture doit contenir 5 chiffres',
    )]
    private ?string $closingHourMorning = null;


    #[ORM\Column(length:5)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures d\'ouverture  de l\'entreprise.')]
    #[Assert\Length(
        min: 5, max: 5,
        minMessage:'L\'heure d\'ouverture doit contenir 5 chiffres',
    )]
    private ?string $openingHourAfternoon = null;


    #[ORM\Column(length:5)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures de fermeture  du l\'entreprise.')]
    #[Assert\Length(
        min: 5, max: 5,
        minMessage:'L\'heure de fermeture doit contenir 5 chiffres',
    )]    
    private ?string $closingHourAfternoon = null;
    

    #[ORM\ManyToOne(inversedBy: 'Opening')]
    private ?Enterprise $enterprise = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpeningDay(): ?string
    {
        return $this->openingDay;
    }

    public function setOpeningDay(string $openingDay): static
    {
        $this->openingDay = $openingDay;

        return $this;
    }

    public function getOpeningHourMorning(): ?string
    {
        return $this->openingHourMorning;
    }

    public function setOpeningHourMorning(string $openingHourMorning): static
    {
        $this->openingHourMorning = $openingHourMorning;

        return $this;
    }

    public function getClosingHourMorning(): ?string
    {
        return $this->closingHourMorning;
    }

    public function setClosingHourMorning(string $closingHourMorning): static
    {
        $this->closingHourMorning = $closingHourMorning;

        return $this;
    }

    public function getOpeningHourAfternoon(): ?string
    {
        return $this->openingHourAfternoon;
    }

    public function setOpeningHourAfternoon(string $openingHourAfternoon): static
    {
        $this->openingHourAfternoon = $openingHourAfternoon;

        return $this;
    }

    public function getClosingHourAfternoon(): ?string
    {
        return $this->closingHourAfternoon;
    }

    public function setClosingHourAfternoon(string $closingHourAfternoon): static
    {
        $this->closingHourAfternoon = $closingHourAfternoon;

        return $this;
    }

    public function getEnterprise(): ?Enterprise
    {
        return $this->enterprise;
    }

    public function setEnterprise(?Enterprise $enterprise): static
    {
        $this->enterprise = $enterprise;

        return $this;
    }
}
