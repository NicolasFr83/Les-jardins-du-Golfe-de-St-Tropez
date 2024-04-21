<?php

namespace App\Entity;

use App\Repository\TipsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;


#[Vich\Uploadable]
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
    private ?string $planting = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner la description de la section.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'La section doit être de 10 caractères minimum.',
        maxMessage: "La section doit pas dépasser 1255 caractères"
    )]
    private ?string $maintenance = null;

    #[Vich\UploadableField(mapping: 'plants_images', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $imageName = null;


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

    public function getPlanting(): ?string
    {
        return $this->planting;
    }

    public function setPlanting(string $planting): static
    {
        $this->planting = $planting;

        return $this;
    }

    public function getMaintenance(): ?string
    {
        return $this->maintenance;
    }

    public function setMaintenance(string $maintenance): static
    {
        $this->maintenance = $maintenance;

        return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImageFile($imageFile): self
    {
        $this->imageFile = $imageFile;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(string $imageName): static
    {
        $this->imageName = $imageName;

        return $this;
    }
}
