<?php

namespace App\Models;

class Snake
{
    public function __construct(
        public string $id,
        public string $name,
        public int $health,
        public Coordinate $head,
        public array $body,
        public int $length
    ) {
    }
}
