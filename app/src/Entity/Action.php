<?php

namespace App\Entity;

use App\Repository\ActionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActionRepository::class)]
class Action
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 50, unique: true)]
    private ?string $code = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $energyCost = 0;

    #[ORM\Column(nullable: true)]
    private ?int $hungerEffect = null;

    #[ORM\Column(nullable: true)]
    private ?int $healthEffect = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $moneyEffect = null;

    #[ORM\Column(nullable: true)]
    private ?int $skillRequired = null;

    #[ORM\ManyToOne(inversedBy: 'actions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getEnergyCost(): ?int
    {
        return $this->energyCost;
    }

    public function setEnergyCost(int $energyCost): static
    {
        $this->energyCost = $energyCost;
        return $this;
    }

    public function getHungerEffect(): ?int
    {
        return $this->hungerEffect;
    }

    public function setHungerEffect(?int $hungerEffect): static
    {
        $this->hungerEffect = $hungerEffect;
        return $this;
    }

    public function getHealthEffect(): ?int
    {
        return $this->healthEffect;
    }

    public function setHealthEffect(?int $healthEffect): static
    {
        $this->healthEffect = $healthEffect;
        return $this;
    }

    public function getMoneyEffect(): ?string
    {
        return $this->moneyEffect;
    }

    public function setMoneyEffect(?string $moneyEffect): static
    {
        $this->moneyEffect = $moneyEffect;
        return $this;
    }

    public function getSkillRequired(): ?int
    {
        return $this->skillRequired;
    }

    public function setSkillRequired(?int $skillRequired): static
    {
        $this->skillRequired = $skillRequired;
        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;
        return $this;
    }
}
