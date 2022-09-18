<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::apiResource('game', GameController::class);
