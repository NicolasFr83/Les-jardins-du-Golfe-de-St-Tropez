<?php

namespace App\Entity;

use App\Repository\HomePageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: HomePageRepository::class)]
class HomePage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le titre de la page.')]
    #[Assert\Length(
        min: 2, max: 50,
        minMessage: 'Le titre  doit être de 2 caractères minimum.',
        maxMessage: "Le titre  ne doit pas dépasser 50 caractères"
    )]

    private ?string $title = null;

    #[ORM\Column(length: 1000)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le champ de bienvenue.')]
    #[Assert\Length(
        min: 10, max: 1000,
        minMessage: 'Le champ doit être de 10 caractères minimum.',
        maxMessage: "La champ ne doit pas dépasser 1000 caractères"
    )]
    private ?string $presentationText = null;

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
        return $this->presentationText;
    }

    public function setPresentationText(string $presentationText): static
    {
        $this->presentationText = $presentationText;

        return $this;
    }
}
