<?php

namespace App\Entity;

use App\Repository\FormContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: FormContactRepository::class)]
class FormContact
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
        maxMessage: "Le nom ne doit pas dépasser 15 caractères"
    )]
    #[Assert\Regex(pattern: '/^[a-zA-Z]+$/', message: 'Le nom ne doit contenir que des lettres.')]
    private ?string $Name = null;


    #[ORM\Column(type: 'string', length: 25)]
    #[Assert\NotBlank(message: 'Veuillez renseigner un prénom.')]
    #[Assert\Length(min: 2, max: 25,
        minMessage:'Le prénom doit contenir minimum 2 lettres.',
        maxMessage: "Le prénom ne doit pas dépasser 25 caractères"
    )]
    #[Assert\Regex(pattern: '/^[a-zA-ZÀ-ÿ -]+$/', message: "Le prénom ne doit contenir que des lettres")]
    private ?string $FirstName = null;


    #[ORM\Column(length: 25)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre email.')]
    #[Assert\Email(message: 'Veuillez renseigner un email valide.')]
    private ?string $Email = null;


    #[ORM\Column(length: 15)]
    #[Assert\NotBlank(message: 'Veuillez renseigner un numéro de téléphone.')]
    #[Assert\Length(
        min: 10, max: 15,
        minMessage: 'Le numéro de téléphone doit être de 10 caractères minimum.',
        maxMessage: "Le numéro de téléphone ne doit pas dépasser 15 caractères"
    )]
    #[Assert\Regex(pattern: '/^0[1-9]([-. ]?[0-9]{2}){4}$/', message: 'Le numéro de téléphone ne doit contenir que des chiffres, des espaces et le caractère +.')]
    private ?string $PhoneNumber = null;


    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le sujet de votre message.')]
    #[Assert\Length(
        min: 5, max: 50,
        minMessage: 'Le sujet doit être de 5 caractères minimum.',
        maxMessage: "Le sujet  ne doit pas dépasser 50 caractères"
    )]
    private ?string $Subject = null;


    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre message.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'Le message doit être de 10 caractères minimum.',
        maxMessage: "La message ne doit pas dépasser 1255 caractères"
    )]
    private ?string $Message = null;

    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $createdAt = null;

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

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): static
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->PhoneNumber;
    }

    public function setPhoneNumber(string $PhoneNumber): static
    {
        $this->PhoneNumber = $PhoneNumber;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->Subject;
    }

    public function setSubject(string $Subject): static
    {
        $this->Subject = $Subject;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(string $Message): static
    {
        $this->Message = $Message;

        return $this;
    }
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

}
