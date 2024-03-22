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
    private ?string $name = null;


    #[ORM\Column(length: 30)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le nom en latin.')]
    #[Assert\Length(
        min: 3, max: 30,
        minMessage: 'Le champ doit être de 3 caractères minimum.',
        maxMessage: "Le champ  ne doit pas dépasser 30 caractères"
    )]
    private ?string $latinName = null;


    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner la description de la plante.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'La section doit être de 10 caractères minimum.',
        maxMessage: "La section doit pas dépasser 1255 caractères"
    )]
    private ?string $description = null;

    #[Vich\UploadableField(mapping: 'plants_images', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $imageName = null;


    #[ORM\ManyToOne(inversedBy: 'topics')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Watering $watering = null;

    #[ORM\ManyToOne(inversedBy: 'topics')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Exposition $exposition = null;

    #[ORM\ManyToOne(inversedBy: 'topics')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'topics')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Exposure $exposure = null;

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

    public function getLatinName(): ?string
    {
        return $this->latinName;
    }

    public function setLatinName(string $latinName): static
    {
        $this->latinName = $latinName;

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
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getWatering(): ?Watering
    {
        return $this->watering;
    }

    public function setWatering(?Watering $watering): static
    {
        $this->watering = $watering;

        return $this;
    }

    public function getExposition(): ?Exposition
    {
        return $this->exposition;
    }

    public function setExposition(?Exposition $exposition): static
    {
        $this->exposition = $exposition;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getExposure(): ?Exposure
    {
        return $this->exposure;
    }

    public function setExposure(?Exposure $exposure): static
    {
        $this->exposure = $exposure;

        return $this;
    }
}
