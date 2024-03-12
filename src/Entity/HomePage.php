<?php

namespace App\Entity;

use App\Repository\HomePageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HomePageRepository::class)]
class HomePage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    private ?string $Title = null;

    #[ORM\Column(length: 1000)]
    private ?string $PresentationText = null;

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

    public function getPresentationText(): ?string
    {
        return $this->PresentationText;
    }

    public function setPresentationText(string $PresentationText): static
    {
        $this->PresentationText = $PresentationText;

        return $this;
    }
}
