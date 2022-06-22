<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class StateController extends Controller
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $this->logger->info('starting game', ['request' => $request->toArray()]);

        return JsonResponse::fromJsonString(<<<'EOF'
        {
          "apiversion": "1",
          "author": "andysnell",
          "color": "#888888",
          "head": "default",
          "tail": "default",
          "version": "0.0.1-beta"
        }
        EOF);
    }
}
