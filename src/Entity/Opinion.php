<?php

namespace App\Entity;

use App\Repository\OpinionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



#[ORM\Entity(repositoryClass: OpinionRepository::class)]
class Opinion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 25)]
    #[Assert\NotBlank(message: 'Veuillez renseigner un nom.')]
    #[Assert\Length(
        min: 2, max: 25,
        minMessage: 'Le nom doit contenir 2 caractères minimum.',
        maxMessage: "Le nom ne doit pas dépasser 50 caractères"
    )]
    #[Assert\Regex(pattern: '/^[a-zA-Z]+$/', message: 'Le nom ne doit contenir que des lettres.')]
    private ?string $Name = null;


    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre commentaire.')]
    #[Assert\Length(
        min: 10, max: 255,
        minMessage: 'Le message doit être de 10 caractères minimum.',
        maxMessage: "La message ne doit pas dépasser 255 caractères"
    )]
    private ?string $Avis = null;


    #[ORM\Column(length:1)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une note entre 1 et 5.')]
    #[Assert\LessThanOrEqual(
        value: 5,
        message: 'Veuillez renseigner une note entre 1 et 5',
        // maxMessage: 'veuillez renseigner une note entre 1 et 5'
    )]
    #[Assert\GreaterThan(
        value: 1,
        message: 'Veuillez renseigner une note entre 1 et 5'
    )]
    #[Assert\Regex(pattern: '/^[1-5]+$/', message: 'Le Score ne doit contenir que des chiffres.')]
    private ?int $Score = null;

    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $createdAt = null;


    #[ORM\ManyToOne(inversedBy: 'Opinion')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Enterprise $enterprise = null;

    #[ORM\Column]
    private ?bool $isModerated = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

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

    public function getAvis(): ?string
    {
        return $this->Avis;
    }

    public function setAvis(string $Avis): static
    {
        $this->Avis = $Avis;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->Score;
    }

    public function setScore(int $Score): static
    {
        $this->Score = $Score;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $CreatedAt): static
    {
        $this->createdAt = $CreatedAt;

        return $this;
    }

    public function getEnterprise(): ?Enterprise
    {
        return $this->enterprise;
    }

    public function setEnterprise(?Enterprise $enterprise): static
    {
        $this->enterprise = $enterprise;

        return $this;
    }
    public function isIsModerated(): ?bool
    {
        return $this->isModerated;
    }

    public function setIsModerated(bool $isModerated): static
    {
        $this->isModerated = $isModerated;

        return $this;
    }

}
