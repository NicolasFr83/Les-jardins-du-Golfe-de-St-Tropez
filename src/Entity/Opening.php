<?php

namespace App\Entity;

use App\Repository\OpeningRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpeningRepository::class)]
class Opening
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $OpeningDay = null;

    #[ORM\Column]
    private ?int $OpeningHourMorning = null;

    #[ORM\Column]
    private ?int $ClosingHourMorning = null;

    #[ORM\Column]
    private ?int $OpeningHourAfternoon = null;

    #[ORM\Column]
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
