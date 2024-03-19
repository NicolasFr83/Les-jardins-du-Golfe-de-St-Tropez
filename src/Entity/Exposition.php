<?php

namespace App\Entity;

use App\Repository\ExpositionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: ExpositionRepository::class)]
class Exposition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string',length: 50)]
    #[Assert\NotBlank(message: 'Veuillez renseigner l\'exposition de la plante.')]
    #[Assert\Length(
        min: 3, max: 50,
        minMessage: 'Le nom doit contenir 3 caractères minimum.',
        maxMessage: "Le nom ne doit pas dépasser 50 caractères"
    )]
    #[Assert\Regex(pattern: '/^[a-zA-Z]+$/', message: 'Le message ne doit contenir que des lettres.')]
    private ?string $Name = null;
    

    #[ORM\OneToMany(targetEntity: Topics::class, mappedBy: 'Exposition')]
    private Collection $topics;

    public function __construct()
    {
        $this->topics = new ArrayCollection();
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

    /**
     * @return Collection<int, Topics>
     */
    public function getTopics(): Collection
    {
        return $this->topics;
    }

    public function addTopic(Topics $topic): static
    {
        if (!$this->topics->contains($topic)) {
            $this->topics->add($topic);
            $topic->setExposition($this);
        }

        return $this;
    }

    public function removeTopic(Topics $topic): static
    {
        if ($this->topics->removeElement($topic)) {
            // set the owning side to null (unless already changed)
            if ($topic->getExposition() === $this) {
                $topic->setExposition(null);
            }
        }

        return $this;
    }
}
