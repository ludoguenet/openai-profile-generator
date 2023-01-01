<?php

declare(strict_types=1);

use App\Http\Controllers\ProfileGeneratorController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'profile_generators.create');

Route::post('/generate-profile', ProfileGeneratorController::class)
    ->name('generate-profile');
