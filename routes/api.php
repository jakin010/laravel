<?php

use App\Http\Controllers\CallCenterController;
use App\Http\Controllers\TaxibedrijfController;
use App\Http\Middleware\CallCenterAuthMiddleware;
use App\Http\Middleware\TaxibedrijfAuthMiddleware;
use App\Models\Beschikking;
use App\Models\Bewoner;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::prefix('/callcenter')->middleware(CallCenterAuthMiddleware::class)->group(function () {
        Route::get("/bewoners", [CallCenterController::class, "getBewoners"]);
        Route::post("/rit", [CallCenterController::class, "createRit"]);
    });
    Route::prefix("/taxibedrijf")->middleware(TaxibedrijfAuthMiddleware::class)->group(function () {
        Route::get("/rit", [TaxibedrijfController::class, "getRitten"]);
    });
});
