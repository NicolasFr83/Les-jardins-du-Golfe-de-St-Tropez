<?php

namespace App\Entity;

use App\Repository\WateringRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: WateringRepository::class)]
class Watering
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Veuillez renseigner le type d\'arrosage SVP.')]
    #[Assert\Length(
        min: 3, max: 20,
        minMessage: 'Le champ doit être de 3 caractères minimum.',
        maxMessage: "Le champ  ne doit pas dépasser 20 caractères"
    )]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: Topics::class, mappedBy: 'Watering')]
    private Collection $topics;

    public function __construct()
    {
        $this->topics = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;    
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

    public function getTopics(): Collection
    {
        return $this->topics;
    }

    public function addTopic(Topics $topic): static
    {
        if (!$this->topics->contains($topic)) {
            $this->topics->add($topic);
            $topic->setWatering($this);
        }

        return $this;
    }

    public function removeTopic(Topics $topic): static
    {
        if ($this->topics->removeElement($topic)) {
            // set the owning side to null (unless already changed)
            if ($topic->getWatering() === $this) {
                $topic->setWatering(null);
            }
        }

        return $this;
    }
}
