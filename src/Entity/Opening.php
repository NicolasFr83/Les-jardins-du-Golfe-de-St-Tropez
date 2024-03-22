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
    private ?int $openingHourMorning = null;


    #[ORM\Column(length:5)]
    #[Assert\NotBlank(message: 'Veuillez renseigner l\'heure de fermeture.')]
    #[Assert\Length(
        min: 5, max: 5,
        minMessage:'L\'heure de fermeture doit contenir 5 chiffres',
    )]
    private ?int $closingHourMorning = null;


    #[ORM\Column(length:5)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures d\'ouverture  de l\'entreprise.')]
    #[Assert\Length(
        min: 5, max: 5,
        minMessage:'L\'heure d\'ouverture doit contenir 5 chiffres',
    )]
    private ?int $openingHourAfternoon = null;


    #[ORM\Column(length:5)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures de fermeture  du l\'entreprise.')]
    #[Assert\Length(
        min: 5, max: 5,
        minMessage:'L\'heure de fermeture doit contenir 5 chiffres',
    )]    
    private ?int $closingHourAfternoon = null;
    

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

    public function getOpeningHourMorning(): ?int
    {
        return $this->openingHourMorning;
    }

    public function setOpeningHourMorning(int $openingHourMorning): static
    {
        $this->openingHourMorning = $openingHourMorning;

        return $this;
    }

    public function getClosingHourMorning(): ?int
    {
        return $this->closingHourMorning;
    }

    public function setClosingHourMorning(int $closingHourMorning): static
    {
        $this->closingHourMorning = $closingHourMorning;

        return $this;
    }

    public function getOpeningHourAfternoon(): ?int
    {
        return $this->openingHourAfternoon;
    }

    public function setOpeningHourAfternoon(int $openingHourAfternoon): static
    {
        $this->openingHourAfternoon = $openingHourAfternoon;

        return $this;
    }

    public function getClosingHourAfternoon(): ?int
    {
        return $this->closingHourAfternoon;
    }

    public function setClosingHourAfternoon(int $closingHourAfternoon): static
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
