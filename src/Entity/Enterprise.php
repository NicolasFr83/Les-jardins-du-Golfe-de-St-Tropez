<?php

namespace App\Entity;

use App\Repository\EnterpriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnterpriseRepository::class)]
class Enterprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Name = null;

    #[ORM\Column]
    private ?int $PhoneNumber = null;

    #[ORM\Column(length: 25)]
    private ?string $Email = null;

    #[ORM\Column(length: 50)]
    private ?string $Adress = null;

    #[ORM\OneToMany(targetEntity: Opinion::class, mappedBy: 'enterprise')]
    private Collection $Opinion;

    #[ORM\OneToMany(targetEntity: Opening::class, mappedBy: 'enterprise')]
    private Collection $Opening;

    public function __construct()
    {
        $this->Opinion = new ArrayCollection();
        $this->Opening = new ArrayCollection();
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

    public function getPhoneNumber(): ?int
    {
        return $this->PhoneNumber;
    }

    public function setPhoneNumber(int $PhoneNumber): static
    {
        $this->PhoneNumber = $PhoneNumber;

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

    public function getAdress(): ?string
    {
        return $this->Adress;
    }

    public function setAdress(string $Adress): static
    {
        $this->Adress = $Adress;

        return $this;
    }

    /**
     * @return Collection<int, Opinion>
     */
    public function getOpinion(): Collection
    {
        return $this->Opinion;
    }

    public function addOpinion(Opinion $opinion): static
    {
        if (!$this->Opinion->contains($opinion)) {
            $this->Opinion->add($opinion);
            $opinion->setEnterprise($this);
        }

        return $this;
    }

    public function removeOpinion(Opinion $opinion): static
    {
        if ($this->Opinion->removeElement($opinion)) {
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
        return $this->Opening;
    }

    public function addOpening(Opening $opening): static
    {
        if (!$this->Opening->contains($opening)) {
            $this->Opening->add($opening);
            $opening->setEnterprise($this);
        }

        return $this;
    }

    public function removeOpening(Opening $opening): static
    {
        if ($this->Opening->removeElement($opening)) {
            // set the owning side to null (unless already changed)
            if ($opening->getEnterprise() === $this) {
                $opening->setEnterprise(null);
            }
        }

        return $this;
    }
}
