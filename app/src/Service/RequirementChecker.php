<?php

namespace App\Game\Service;

use App\Entity\Character;

class RequirementChecker
{
    public function check(
        Character $character,
        array $requirements
    ): bool {

        foreach ($requirements as $requirement) {

            switch ($requirement['type']) {

                case 'item':

                    // проверить инвентарь

                    break;

                case 'money':

                    if (
                        $character
                            ->getStats()
                            ->getMoney()

                        <

                        $requirement['value']
                    ) {

                        return false;

                    }

                    break;

            }

        }

        return true;
    }
}

