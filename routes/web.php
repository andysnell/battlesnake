<?php

use Illuminate\Support\Facades\Route;

Route::any('/', \App\Http\Controllers\StateController::class);
Route::any('/start', \App\Http\Controllers\StartController::class);
Route::any('/move', \App\Http\Controllers\MoveController::class);
Route::any('/end', \App\Http\Controllers\EndController::class);
