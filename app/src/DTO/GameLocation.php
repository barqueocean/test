<?php

namespace App\DTO;

class GameLocation
{
    public string $code;

    public string $name;

    /** @var GameObject[] */
    public array $objects = [];
}
