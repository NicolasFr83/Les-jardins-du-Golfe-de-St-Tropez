<?php

namespace App\Entity;

use App\Repository\TopicsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;



#[ORM\Entity(repositoryClass: TopicsRepository::class)]
class Topics
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le nom de la plante.')]
    #[Assert\Length(
        min: 3, max: 25,
        minMessage: 'Le champ doit être de 3 caractères minimum.',
        maxMessage: "Le champ  ne doit pas dépasser 25 caractères"
    )]
    private ?string $Name = null;


    #[ORM\Column(length: 30)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le nom en latin.')]
    #[Assert\Length(
        min: 3, max: 30,
        minMessage: 'Le champ doit être de 3 caractères minimum.',
        maxMessage: "Le champ  ne doit pas dépasser 30 caractères"
    )]
    private ?string $LatinName = null;


    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner la description de la plante.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'La section doit être de 10 caractères minimum.',
        maxMessage: "La section doit pas dépasser 1255 caractères"
    )]
    private ?string $Description = null;

    #[Vich\UploadableField(mapping: 'plants_images', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $imageName = null;


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
