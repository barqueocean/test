<?php

namespace App\Game\Service;

use App\Entity\Location;

class LocationLoader
{
    public function load(Location $location): array
    {
        $file = sprintf(
            '%s/config/game/locations/%s.json',
            dirname(__DIR__, 3),
            $location->getType()
        );

        if (!file_exists($file)) {
            throw new \RuntimeException('Location JSON not found');
        }

        return json_decode(
            file_get_contents($file),
            true
        );
    }
}
