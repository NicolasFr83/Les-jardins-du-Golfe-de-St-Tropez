<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;



#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'Cet email existe déjà au sein de cette application.')]

class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\Column(type: 'uuid' , unique: true)]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?int $id = null;

    #[ORM\Column(length: 50, unique: true)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre email.')]
    #[Assert\Email(message: 'Veuillez renseigner un email valide.')]
    private ?string $email = null;


    #[ORM\Column(type: 'json')]
    #[Assert\NotBlank(message: 'Veuillez renseigner le rôle de l\'utilisateur.')]
    private array $roles = ['ROLE_USER'];


    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\Length(
        min: 8, max: 255,
        minMessage: 'Le mot de passe doit contenir au moins 8 caractères.',
        maxMessage: "Le mot de passe ne doit pas dépasser 50 caractères"
    )]
    #[Assert\Regex(
        pattern: '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).+$/',
        message: 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.'
    )]
    private ?string $password = null;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank(message: 'Veuillez renseigner un nom.')]
    #[Assert\Length(
        min: 2, max: 50,
        minMessage: 'Le nom doit contenir 2 caractères minimum.',
        maxMessage: "Le nom ne doit pas dépasser 50 caractères"
    )]
    #[Assert\Regex(pattern: '/^[a-zA-Z]+$/', message: 'Le nom ne doit contenir que des lettres.')]
    private ?string $name = null;


    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank(message: 'Veuillez renseigner un prénom.')]
    #[Assert\Length(min: 2, max: 50,
        minMessage:'Le prénom doit contenir minimum 2 lettres.',
        maxMessage: "Le prénom ne doit pas dépasser 50 caractères"
        )]
        #[Assert\Regex(pattern: '/^[a-zA-ZÀ-ÿ -]+$/', message: "Le prénom ne doit contenir que des lettres")]
        private ?string $firstname = null;

    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $updatedAt = null;
    

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }


    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }
    public function getCreatedat(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedat(\DateTimeImmutable $createdat): static
    {
        $this->createdAt = $createdat;

        return $this;
    }

    public function getUpdatedat(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedat(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

}
