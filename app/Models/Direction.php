<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

namespace App\Models;

enum Direction: string
{
    case UP = "up";
    case DOWN = "down";
    case LEFT = "left";
    case RIGHT = "right";
}
