<?php

namespace App\Http\Controllers;

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
        $this->logger->info('moving', [
            'game' => $request->input('game'),
            'turn' => $request->input('turn'),
            'board' => $request->input('board'),
            'you' => $request->input('you'),
        ]);

        return new JsonResponse(['move' => 'up']);
    }
}
