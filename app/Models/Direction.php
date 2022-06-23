<?php

namespace App\Models;

namespace App\Models;

enum Direction: string
{
    case UP = "up";
    case DOWN = "down";
    case LEFT = "left";
    case RIGHT = "right";

    private const DIR = [
        self::UP,
        self::DOWN,
        self::LEFT,
        self::RIGHT,
    ];

    public static function random(): self
    {
        return self::DIR[\random_int(0, 3)];
    }
}
