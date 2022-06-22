<?php

namespace App\Models;

class Coordinate
{
    public function __construct(
        public int $x,
        public int $y
    ){}
}

