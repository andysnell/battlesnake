<?php

namespace App\Http\Controllers;

use App\Models\ParsedGameBoard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class MoveController extends Controller
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $this->logger->info('move requested', [
            'game' => $request->input('game'),
            'turn' => $request->input('turn'),
            'board' => $request->input('board'),
            'you' => $request->input('you'),
        ]);

        $next_move = ParsedGameBoard::make($request)->getNextMove();

        $this->logger->info('move decided', [
            'move' => $next_move->value,
        ]);

        return new JsonResponse(['move' => $next_move->value]);
    }
}
