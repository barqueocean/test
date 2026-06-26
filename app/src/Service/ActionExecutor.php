<?php

namespace App\Game\Service;

use App\Entity\Character;

class ActionExecutor
{
    public function __construct(

        private RequirementChecker $checker,

        private EffectExecutor $effects

    ) {}

    public function execute(
        Character $character,
        array $action
    ): bool {

        if (
            !$this->checker->check(
                $character,
                $action['requirements'] ?? []
            )
        ) {
            return false;
        }

        $this->effects->execute(
            $character,
            $action['effects']
        );

        return true;
    }
}
