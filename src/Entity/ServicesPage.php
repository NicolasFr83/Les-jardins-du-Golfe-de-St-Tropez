<?php

namespace App\Entity;

use App\Repository\ServicesPageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;


#[ORM\Entity(repositoryClass: ServicesPageRepository::class)]
class ServicesPage
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
    private ?string $Title = null;


    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le champ des services de l\'entreprise.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'Le champ doit être de 10 caractères minimum.',
        maxMessage: "La champ ne doit pas dépasser 1255 caractères"
    )]
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
