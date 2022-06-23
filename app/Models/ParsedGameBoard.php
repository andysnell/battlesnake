<?php

namespace App\Models;

use Illuminate\Http\Request;
use PhpParser\Node\Scalar\MagicConst\Dir;

class ParsedGameBoard
{

    public int $height;
    public int $width;
    public array $food;
    public array $hazards;
    public array $snakes;

    public array $game;
    public int $turn;
    public array $board;
    public array $you;

    public function __construct(Request $request)
    {
        $this->game = $request->input('game');
        $this->turn = $request->input('turn');
        $this->board = $request->input('board');
        $this->you = $request->input('you');
    }

    public static function make(Request $request): self
    {
        return new self($request);
    }

    public function getNextMove(): Direction
    {
        $you = $this->createYou();

        $directions = Direction::POOL;

        if ($you->head->x === 0) {
            unset($directions["LEFT"]);
        }
        if ($you->head->y === 0) {
            unset($directions["DOWN"]);
        }
        if ($you->head->y === $this->board->height - 1) {
            unset($directions["UP"]);
        }
        if ($you->head->x === $this->board->width - 1) {
            unset($directions["RIGHT"]);
        }

        return $directions[array_rand($directions)];
    }

    private function getBoard(): Board
    {
        $board_data = $this->board;

        return new Board(
            $board_data['height'],
            $board_data['width'],
            collect($board_data['food'])->map(function ($item, $key) {
                return new Point($item['x'], $item['y']);
            })->all(),
            collect($board_data['hazards'])->map(function ($item, $key) {
                return new Point($item['x'], $item['y']);
            })->all(),
            $this->getSnakesFrom($board_data['snakes']),
        );
    }

    private function createYou(): Snake
    {
        return new Snake(
            $this->you['id'],
            $this->you['name'],
            $this->you['health'],
            new Point($this->you['head']['x'], $this->you['head']['y']),
            [new Point($this->you['head']['x'], $this->you['head']['y'])],
            $this->you['length']
        );
    }

    private function getSnakesFrom(array $snake_data): array
    {
        return collect($snake_data)->map(function ($item, $key) {
            return new Snake(
                $item['id'],
                $item['name'],
                $item['health'],
                new Point($item['head']['x'], $item['head']['y']),
                collect($item['body'])->map(function ($body_coord, $key) {
                    return new Point($body_coord['x'], $body_coord['y']);
                })->all(),
                $item['length'],
            );
        })->all();
    }
}

