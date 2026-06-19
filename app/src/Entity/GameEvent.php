<?php

namespace App\Entity;

use App\Repository\GameEventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameEventRepository::class)]
class GameEvent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $background = null;

    #[ORM\Column(length: 30)]
    private ?string $eventType = null;

    #[ORM\Column(nullable: true)]
    private ?int $minDay = null;

    #[ORM\Column(nullable: true)]
    private ?int $maxDay = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $requiredOrigin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(?string $background): static
    {
        $this->background = $background;

        return $this;
    }

    public function getEventType(): ?string
    {
        return $this->eventType;
    }

    public function setEventType(string $eventType): static
    {
        $this->eventType = $eventType;

        return $this;
    }

    public function getMinDay(): ?int
    {
        return $this->minDay;
    }

    public function setMinDay(?int $minDay): static
    {
        $this->minDay = $minDay;

        return $this;
    }

    public function getMaxDay(): ?int
    {
        return $this->maxDay;
    }

    public function setMaxDay(?int $maxDay): static
    {
        $this->maxDay = $maxDay;

        return $this;
    }

    public function getRequiredOrigin(): ?string
    {
        return $this->requiredOrigin;
    }

    public function setRequiredOrigin(?string $requiredOrigin): static
    {
        $this->requiredOrigin = $requiredOrigin;

        return $this;
    }
}
