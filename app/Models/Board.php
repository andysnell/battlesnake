<?php

namespace App\Models;

class Board
{
    public function __construct(
        public int $height,
        public int $width,
        public array $food,
        public array $hazards,
        public array $snakes
    )
    {}

    public function getGrid() {

        for($i=0; $i < $this->height; $i++) {

        }

    }
}
