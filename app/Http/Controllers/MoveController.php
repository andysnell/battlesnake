<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MoveController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse(['controller' => 'move']);
    }
}
