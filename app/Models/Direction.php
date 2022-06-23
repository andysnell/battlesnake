<?php

namespace App\Models;

namespace App\Models;

enum Direction: string
{
    case UP = "up";
    case DOWN = "down";
    case LEFT = "left";
    case RIGHT = "right";

    public const POOL = [
        "UP" => self::UP,
        "DOWN" => self::DOWN,
        "LEFT" => self::LEFT,
        "RIGHT" => self::RIGHT,
    ];

    public static function random(): self
    {
        return self::POOL[\random_int(0, 3)];
    }
}
