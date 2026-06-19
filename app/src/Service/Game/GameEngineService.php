<?php

namespace App\Service\Game;

use App\Entity\Action;
use App\Entity\Character;
use Doctrine\ORM\EntityManagerInterface;

class GameEngineService
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager
    ) {}

    public function nextDay(Character $character): void
    {
        $character->setDay($character->getDay() + 1);

        $stats = $character->getStats();

        $stats->setHunger($stats->getHunger() - 10);
        $stats->setEnergy($stats->getEnergy() - 15);
        $stats->setHygiene($stats->getHygiene() - 5);
        $stats->setMotivation($stats->getMotivation() - 3);

        if ($stats->getHunger() <= 0) {
            $stats->setHealth($stats->getHealth() - 20);
        }

        if ($stats->getHealth() <= 0) {
            $character->setStatus('dead');
        }

        $this->entityManager->flush();
    }

    public function performAction(Character $character, Action $action): void
    {
        $stats = $character->getStats();

        $stats->setEnergy(
            $stats->getEnergy() - $action->getEnergyCost()
        );

        if ($action->getHungerEffect()) {
            $stats->setHunger(
                $stats->getHunger() + $action->getHungerEffect()
            );
        }

        if ($action->getHealthEffect()) {
            $stats->setHealth(
                $stats->getHealth() + $action->getHealthEffect()
            );
        }

        if ($action->getMoneyEffect()) {
            $stats->setMoney(
                bcadd($stats->getMoney(), $action->getMoneyEffect(), 2)
            );
        }

        $this->entityManager->flush();
    }

    public function canDoAction(Character $character, Action $action): bool
    {
        $stats = $character->getStats();

        if ($action->getSkillRequired() !== null) {
            return $stats->getSkill() >= $action->getSkillRequired();
        }

        return true;
    }
}
