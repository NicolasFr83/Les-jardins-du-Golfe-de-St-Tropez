<?php

namespace App\Entity;

use App\Repository\ContactPageRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactPageRepository::class)]
class ContactPage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le titre de la page.')]
    #[Assert\Length(
        min: 2, max: 255,
        minMessage: 'Le titre  doit être de 2 caractères minimum.',
        maxMessage: "Le titre  ne doit pas dépasser 255 caractères"
    )]

    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner la presentation de la page.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'La description de la page doit être de 10 caractères minimum.',
        maxMessage: "La description de la page ne doit pas dépasser 1255 caractères"
    )]
    private ?string $PresentationText = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

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
