<?php

namespace App\Entity;

use App\Repository\ServicesPageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicesPageRepository::class)]
class ServicesPage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 1500)]
    private ?string $ServicesPresentation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getServicesPresentation(): ?string
    {
        return $this->ServicesPresentation;
    }

    public function setServicesPresentation(string $ServicesPresentation): static
    {
        $this->ServicesPresentation = $ServicesPresentation;

        return $this;
    }
}
