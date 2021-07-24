<?php

use Illuminate\Support\Facades\Route;

Route::resource('institutions', App\Http\Controllers\Api\InstitutionController::class)->only(['index']);
