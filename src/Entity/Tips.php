<?php

namespace App\Entity;

use App\Repository\TipsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: TipsRepository::class)]
class Tips
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le titre de la section astuces.')]
    #[Assert\Length(
        min: 2, max: 50,
        minMessage: 'La titre  doit être de 2 caractères minimum.',
        maxMessage: "La titre  ne doit pas dépasser 50 caractères"
    )]
    private ?string $name = null;


    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner la description de la section.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'La section doit être de 10 caractères minimum.',
        maxMessage: "La section doit pas dépasser 1255 caractères"
    )]
    private ?string $description = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
