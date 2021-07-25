<?php

use Illuminate\Support\Facades\Route;

Route::middleware('authentication')->group(function () {
    Route::resource('institutions', App\Http\Controllers\Api\InstitutionController::class)->only(['index']);
    Route::resource('agreements', App\Http\Controllers\Api\AgreementController::class)->only(['index']);

    Route::post('simulations', App\Http\Controllers\Api\SimulationController::class);
});
