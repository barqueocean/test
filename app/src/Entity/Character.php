<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: 'game_character')]
class Character
{
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?City $currentCity = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?Location $currentLocation = null;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 20)]
    private ?string $origin = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $profession = null;

    #[ORM\Column]
    private ?int $day = 1;

    #[ORM\Column(length: 20)]
    private ?string $status = 'active';

    #[ORM\ManyToOne(inversedBy: 'characters')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToOne(
        mappedBy: 'character',
        targetEntity: CharacterStats::class,
        cascade: ['persist', 'remove']
    )]
    private ?CharacterStats $stats = null;

    /**
     * @var Collection<int, CharacterItem>
     */
    #[ORM\OneToMany(mappedBy: 'character', targetEntity: CharacterItem::class)]
    private Collection $characterItems;

    public function __construct()
    {
        $this->characterItems = new ArrayCollection();
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

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): static
    {
        $this->origin = $origin;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): static
    {
        $this->profession = $profession;

        return $this;
    }

    public function getDay(): ?int
    {
        return $this->day;
    }

    public function setDay(int $day): static
    {
        $this->day = $day;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getStats(): ?CharacterStats
    {
        return $this->stats;
    }

    public function setStats(CharacterStats $stats): static
    {
        $this->stats = $stats;

        if ($stats->getCharacter() !== $this) {
            $stats->setCharacter($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, CharacterItem>
     */
    public function getItem(): Collection
    {
        return $this->item;
    }

    public function addItem(CharacterItem $item): static
    {
        if (!$this->item->contains($item)) {
            $this->item->add($item);
            $item->setCharacter�p($this);
        }

        return $this;
    }

    public function removeItem(CharacterItem $item): static
    {
        if ($this->item->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getCharacter�p() === $this) {
                $item->setCharacter�p(null);
            }
        }

        return $this;
    }

    public function getCharacterItems(): Collection
    {
        return $this->characterItems;
    }

    public function getCurrentCity(): ?City
    {
        return $this->currentCity;
    }

    public function setCurrentCity(?City $currentCity): static
    {
        $this->currentCity = $currentCity;

        return $this;
    }

    public function getCurrentLocation(): ?Location
    {
        return $this->currentLocation;
    }

    public function setCurrentLocation(?Location $currentLocation): static
    {
        $this->currentLocation = $currentLocation;

        return $this;
    }
}

