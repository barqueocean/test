<?php

namespace App\Game\Service;

use App\Entity\Character;

class EffectExecutor
{
    public function execute(
        Character $character,
        array $effects
    ): void {

        $stats = $character->getStats();

        foreach ($effects as $effect) {

            switch ($effect['type']) {

                case 'thirst':

                    $stats->setThirst(
                        $stats->getThirst()
                        +
                        $effect['value']
                    );

                    break;

                case 'hunger':

                    $stats->setHunger(
                        $stats->getHunger()
                        +
                        $effect['value']
                    );

                    break;

            }

        }

    }
}

