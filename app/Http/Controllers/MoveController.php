<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MoveController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        logger()->debug('payload', [
            'request' => $request->toArray()
        ]);

        return new JsonResponse(['move' => 'up']);
    }
}
