<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    // head, body, legs, feet, hands, inventory
    #[ORM\Column(length: 30)]
    private ?string $slot = null;

    #[ORM\Column]
    private ?int $durability = 100;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $value = '0';

    #[ORM\Column(nullable: true)]
    private ?int $warmth = null;

    #[ORM\Column(nullable: true)]
    private ?int $hygieneBonus = null;

    /**
     * @var Collection<int, CharacterItem>
     */
    #[ORM\OneToMany(
        mappedBy: 'item',
        targetEntity: CharacterItem::class
    )]
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

    public function getSlot(): ?string
    {
        return $this->slot;
    }

    public function setSlot(string $slot): static
    {
        $this->slot = $slot;
        return $this;
    }

    public function getDurability(): ?int
    {
        return $this->durability;
    }

    public function setDurability(int $durability): static
    {
        $this->durability = $durability;
        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): static
    {
        $this->value = $value;
        return $this;
    }

    public function getWarmth(): ?int
    {
        return $this->warmth;
    }

    public function setWarmth(?int $warmth): static
    {
        $this->warmth = $warmth;
        return $this;
    }

    public function getHygieneBonus(): ?int
    {
        return $this->hygieneBonus;
    }

    public function setHygieneBonus(?int $hygieneBonus): static
    {
        $this->hygieneBonus = $hygieneBonus;
        return $this;
    }

    /**
     * @return Collection<int, CharacterItem>
     */
    public function getCharacterItems(): Collection
    {
        return $this->characterItems;
    }

    public function addCharacterItem(CharacterItem $characterItem): static
    {
        if (!$this->characterItems->contains($characterItem)) {
            $this->characterItems->add($characterItem);
            $characterItem->setItem($this);
        }

        return $this;
    }

    public function removeCharacterItem(CharacterItem $characterItem): static
    {
        if ($this->characterItems->removeElement($characterItem)) {
            if ($characterItem->getItem() === $this) {
                $characterItem->setItem(null);
            }
        }

        return $this;
    }
}
