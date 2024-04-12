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
    private ?string $title = null;


    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le champ des services de l\'entreprise.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'Le champ doit être de 10 caractères minimum.',
        maxMessage: "La champ ne doit pas dépasser 1255 caractères"
    )]
    private ?string $servicesPresentation = null;


    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le champ des services création de l\'entreprise.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'Le champ doit être de 10 caractères minimum.',
        maxMessage: "La champ ne doit pas dépasser 1255 caractères"
    )]
    private ?string $creationPresentationText = null;


    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le champ des services spécialisés de l\'entreprise.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'Le champ doit être de 10 caractères minimum.',
        maxMessage: "La champ ne doit pas dépasser 1255 caractères"
    )]
    private ?string $specialServicesText = null;

    
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

    public function getServicesPresentation(): ?string
    {
        return $this->servicesPresentation;
    }

    public function setServicesPresentation(string $servicesPresentation): static
    {
        $this->servicesPresentation = $servicesPresentation;

        return $this;
    }

    public function getCreationPresentationText(): ?string
    {
        return $this->creationPresentationText;
    }

    public function setCreationPresentationText(string $creationPresentationText): static
    {
        $this->creationPresentationText = $creationPresentationText;

        return $this;
    }

    public function getSpecialServicesText(): ?string
    {
        return $this->specialServicesText;
    }

    public function setSpecialServicesText(string $specialServicesText): static
    {
        $this->specialServicesText = $specialServicesText;

        return $this;
    }
}
