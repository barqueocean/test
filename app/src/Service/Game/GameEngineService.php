<?php

namespace App\Service\Game;

use App\Entity\Character;
use Doctrine\ORM\EntityManagerInterface;

class GameEngineService
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    public function tick(Character $character): void
    {
        $stats = $character->getStats();

        // голод растёт
        $stats->setHunger(
            min(100, $stats->getHunger() + 1)
        );

        // жажда растёт быстрее
        $stats->setThirst(
            min(100, $stats->getThirst() + 2)
        );

        // энергия падает
        $stats->setEnergy(
            max(0, $stats->getEnergy() - 1)
        );

        // гигиена падает
        $stats->setHygiene(
            max(0, $stats->getHygiene() - 1)
        );

        // если критический голод
        if ($stats->getHunger() >= 90) {
            $stats->setHealth(
                max(0, $stats->getHealth() - 2)
            );
        }

        // если критическая жажда
        if ($stats->getThirst() >= 90) {
            $stats->setHealth(
                max(0, $stats->getHealth() - 3)
            );
        }

        // смерть
        if ($stats->getHealth() <= 0) {
            $character->setStatus('dead');
        }

        $this->entityManager->flush();
    }
}
