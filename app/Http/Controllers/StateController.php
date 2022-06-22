<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
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
