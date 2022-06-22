<?php

namespace App\Models;

use Ramsey\Collection\Collection;

class ParsedGameBoard
{

    public int $height;
    public int $width;
    public array $food;
    public array $hazards;
    public array $snakes;

    public $data;

    public function __construct(string $data)
    {
        $this->data = json_decode($data, true);
    }

    public function getBoard() : Board {
        $board_data = $this->data["board"];

        return new Board(
            $board_data['height'],
            $board_data['width'],
            collect($board_data['food'])->map(function($item,$key) {
                return new Coordinate($item['x'], $item['y']);
            })->all(),
            collect($board_data['hazards'])->map(function($item,$key) {
                return new Coordinate($item['x'], $item['y']);
            })->all(),
            $this->getSnakesFrom($board_data['snakes']),
        );
    }

    public function getSnakesFrom(array $snake_data) : array {
        return collect($snake_data)->map(function ($item, $key) {
            return new Snake(
                $item['id'],
                $item['name'],
                $item['health'],
                new Coordinate($item['head']['x'],$item['head']['y']),
                collect($item['body'])->map(function ($body_coord, $key)  {
                    return new Coordinate($body_coord['x'],$body_coord['y']);
                })->all(),
                $item['length'],
            );
        })->all();
    }

}

