<?php

use App\Http\Controllers\RoomInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("room-types-count-avg", [RoomInfoController::class, 'getCountAverage']);
Route::get("room-types-last-price", [RoomInfoController::class, 'getLastPrice']);
