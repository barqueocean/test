<?php

namespace App\Entity;

use App\Repository\CharacterStatsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterStatsRepository::class)]
class CharacterStats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $hunger = 50;

    #[ORM\Column]
    private ?int $energy = 70;

    #[ORM\Column]
    private ?int $sleep = 70;

    #[ORM\Column]
    private ?int $stress = 20;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private ?string $money = '0.00';

    #[ORM\Column]
    private ?int $skill = 0;

    #[ORM\Column]
    private ?int $health = 80;

    #[ORM\Column]
    private ?int $motivation = 50;

    #[ORM\Column]
    private ?int $hygiene = 50;

    #[ORM\Column]
    private ?int $social = 10;

    #[ORM\OneToOne(inversedBy: 'stats', targetEntity: Character::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $character = null;

    public function getId(): ?int { return $this->id; }

    public function getHunger(): ?int { return $this->hunger; }
    public function setHunger(int $hunger): static { $this->hunger = max(0, min(100, $hunger)); return $this; }

    public function getEnergy(): ?int { return $this->energy; }
    public function setEnergy(int $energy): static { $this->energy = max(0, min(100, $energy)); return $this; }

    public function getSleep(): ?int { return $this->sleep; }
    public function setSleep(int $sleep): static { $this->sleep = max(0, min(100, $sleep)); return $this; }

    public function getStress(): ?int { return $this->stress; }
    public function setStress(int $stress): static { $this->stress = max(0, min(100, $stress)); return $this; }

    public function getMoney(): ?string { return $this->money; }
    public function setMoney(string $money): static { $this->money = $money; return $this; }

    public function getSkill(): ?int { return $this->skill; }
    public function setSkill(int $skill): static { $this->skill = max(0, $skill); return $this; }

    public function getHealth(): ?int { return $this->health; }
    public function setHealth(int $health): static { $this->health = max(0, min(100, $health)); return $this; }

    public function getMotivation(): ?int { return $this->motivation; }
    public function setMotivation(int $motivation): static { $this->motivation = max(0, min(100, $motivation)); return $this; }

    public function getHygiene(): ?int { return $this->hygiene; }
    public function setHygiene(int $hygiene): static { $this->hygiene = max(0, min(100, $hygiene)); return $this; }

    public function getSocial(): ?int { return $this->social; }
    public function setSocial(int $social): static { $this->social = max(0, min(100, $social)); return $this; }

    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    public function setCharacter(Character $character): static
    {
        $this->character = $character;
        return $this;
    }
}
