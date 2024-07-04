<?php

use App\Http\Controllers\FizzBuzzController;
use App\Http\Controllers\ArraySplitController;
use App\Http\Controllers\MondayController;
use Illuminate\Support\Facades\Route;

Route::get('/fizzbuzz/{num}', [FizzBuzzController::class, 'index']);
Route::get('/array/{num}', [ArraySplitController::class, 'index']);
Route::get('/monday', [MondayController::class, 'index']);
