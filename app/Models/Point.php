<?php

namespace App\Models;

class Point
{
    public function __construct(
        public int $x,
        public int $y
    ){}

    public function subtract(Point $end): Point
    {
        return new Point($this->x - $end->x, $this->y - $end->y);
    }
    public function magnitude(Point $end): int
    {
        return sqrt(pow($end->x - $this->x, 2) + pow($end->y - $this->y, 2));
    }
    public function normalize(Point $end): Point
    {
        $magnitude = $this->magnitude($end);
        if ($magnitude === 0) {return new Point(0, 0);}
        return new Point($this->x / $magnitude, $this->y / $magnitude);
    }
    /**
     * If positive $end is to the right
     * If negative $end is to the left
     **/
    public function dotProduct(Point $end): int
    {
        return ($this->x * $end->x) + ($this->y * $end->y);
    }
    /**
     * If positive $end is up
     * if positive $end is down
     **/
    public function crossProduct(Point $end): int
    {
        return ($this->x * $end->y) - ($this->y * $end->x);
    }
}

