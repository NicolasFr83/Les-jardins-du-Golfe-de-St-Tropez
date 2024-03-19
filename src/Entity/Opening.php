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
    private ?string $OpeningDay = null;

    #[ORM\Column(length:5)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures d\'ouverture  du l\'entreprise.')]
    #[Assert\Length(
        min: 5, max: 5,
        minMessage:'L\'heure d\'ouverture doit contenir 5 chiffres',
    )]
    private ?int $OpeningHourMorning = null;


    #[ORM\Column(length:5)]
    #[Assert\NotBlank(message: 'Veuillez renseigner l\'heure de fermeture.')]
    #[Assert\Length(
        min: 5, max: 5,
        minMessage:'L\'heure de fermeture doit contenir 5 chiffres',
    )]
    private ?int $ClosingHourMorning = null;


    #[ORM\Column(length:5)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures d\'ouverture  de l\'entreprise.')]
    #[Assert\Length(
        min: 5, max: 5,
        minMessage:'L\'heure d\'ouverture doit contenir 5 chiffres',
    )]
    private ?int $OpeningHourAfternoon = null;


    #[ORM\Column(length:5)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures de fermeture  du l\'entreprise.')]
    #[Assert\Length(
        min: 5, max: 5,
        minMessage:'L\'heure de fermeture doit contenir 5 chiffres',
    )]    
    private ?int $ClosingHourAfternoon = null;
    

    #[ORM\ManyToOne(inversedBy: 'Opening')]
    private ?Enterprise $enterprise = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpeningDay(): ?string
    {
        return $this->OpeningDay;
    }

    public function setOpeningDay(string $OpeningDay): static
    {
        $this->OpeningDay = $OpeningDay;

        return $this;
    }

    public function getOpeningHourMorning(): ?int
    {
        return $this->OpeningHourMorning;
    }

    public function setOpeningHourMorning(int $OpeningHourMorning): static
    {
        $this->OpeningHourMorning = $OpeningHourMorning;

        return $this;
    }

    public function getClosingHourMorning(): ?int
    {
        return $this->ClosingHourMorning;
    }

    public function setClosingHourMorning(int $ClosingHourMorning): static
    {
        $this->ClosingHourMorning = $ClosingHourMorning;

        return $this;
    }

    public function getOpeningHourAfternoon(): ?int
    {
        return $this->OpeningHourAfternoon;
    }

    public function setOpeningHourAfternoon(int $OpeningHourAfternoon): static
    {
        $this->OpeningHourAfternoon = $OpeningHourAfternoon;

        return $this;
    }

    public function getClosingHourAfternoon(): ?int
    {
        return $this->ClosingHourAfternoon;
    }

    public function setClosingHourAfternoon(int $ClosingHourAfternoon): static
    {
        $this->ClosingHourAfternoon = $ClosingHourAfternoon;

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
