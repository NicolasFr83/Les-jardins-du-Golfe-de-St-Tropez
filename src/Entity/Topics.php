<?php

namespace App\Entity;

use App\Repository\TopicsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TopicsRepository::class)]
class Topics
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    private ?string $Name = null;

    #[ORM\Column(length: 30)]
    private ?string $LatinName = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\ManyToOne(inversedBy: 'topics')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Watering $Watering = null;

    #[ORM\ManyToOne(inversedBy: 'topics')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Exposition $Exposition = null;

    #[ORM\ManyToOne(inversedBy: 'topics')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $Category = null;

    #[ORM\ManyToOne(inversedBy: 'topics')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Exposure $Exposure = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getLatinName(): ?string
    {
        return $this->LatinName;
    }

    public function setLatinName(string $LatinName): static
    {
        $this->LatinName = $LatinName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getWatering(): ?Watering
    {
        return $this->Watering;
    }

    public function setWatering(?Watering $Watering): static
    {
        $this->Watering = $Watering;

        return $this;
    }

    public function getExposition(): ?Exposition
    {
        return $this->Exposition;
    }

    public function setExposition(?Exposition $Exposition): static
    {
        $this->Exposition = $Exposition;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->Category;
    }

    public function setCategory(?Category $Category): static
    {
        $this->Category = $Category;

        return $this;
    }

    public function getExposure(): ?Exposure
    {
        return $this->Exposure;
    }

    public function setExposure(?Exposure $Exposure): static
    {
        $this->Exposure = $Exposure;

        return $this;
    }
}
