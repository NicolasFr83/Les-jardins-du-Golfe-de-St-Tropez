<?php

namespace App\Entity;

use App\Repository\EnterpriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EnterpriseRepository::class)]
class Enterprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le nom de l\'entreprise.')]
    #[Assert\Length(
        min: 2, max: 25,
        minMessage: 'Le nom  doit être de 2 caractères minimum.',
        maxMessage: "Le nom  ne doit pas dépasser 25 caractères",
    )]
    private ?string $name = null;


    #[ORM\Column(length:15)]
    #[Assert\NotBlank(message: 'Veuillez renseigner un numéro de téléphone de l\'entreprise.')]
    #[Assert\Length(
        min: 10, max: 10,
        minMessage:'Le numéro de téléphone doit contenir 10 chiffres',
    )]
    #[Assert\Regex(pattern: '/^0[1-9]([-. ]?[0-9]{2}){4}$/', message: 'Le numéro de téléphone ne doit contenir que des chiffres, des espaces et le caractère +.')]
    private ?string $phoneNumber = null;


    #[ORM\Column(length: 25)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre email.')]
    #[Assert\Email(message: 'Veuillez renseigner un email valide.')]
    private ?string $email = null;


    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le titre de la page.')]
    #[Assert\Length(
        min: 2, max: 50,
        minMessage: "L\'adresse doit être de 2 caractères minimum.",
        maxMessage: "L/'adresse  ne doit pas dépasser 50 caractères"
    )]
    private ?string $adress = null;
    

    #[ORM\OneToMany(targetEntity: Opinion::class, mappedBy: 'enterprise')]
    private Collection $opinion;

    #[ORM\OneToMany(targetEntity: Opening::class, mappedBy: 'enterprise')]
    private Collection $opening;

    public function __construct()
    {
        $this->opinion = new ArrayCollection();
        $this->opening = new ArrayCollection();
    }

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

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
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

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * @return Collection<int, Opinion>
     */
    public function getOpinion(): Collection
    {
        return $this->opinion;
    }

    public function addOpinion(Opinion $opinion): static
    {
        if (!$this->opinion->contains($opinion)) {
            $this->opinion->add($opinion);
            $opinion->setEnterprise($this);
        }

        return $this;
    }

    public function removeOpinion(Opinion $opinion): static
    {
        if ($this->opinion->removeElement($opinion)) {
            // set the owning side to null (unless already changed)
            if ($opinion->getEnterprise() === $this) {
                $opinion->setEnterprise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Opening>
     */
    public function getOpening(): Collection
    {
        return $this->opening;
    }

    public function addOpening(Opening $opening): static
    {
        if (!$this->opening->contains($opening)) {
            $this->opening->add($opening);
            $opening->setEnterprise($this);
        }

        return $this;
    }

    public function removeOpening(Opening $opening): static
    {
        if ($this->opening->removeElement($opening)) {
            // set the owning side to null (unless already changed)
            if ($opening->getEnterprise() === $this) {
                $opening->setEnterprise(null);
            }
        }

        return $this;
    }
}
