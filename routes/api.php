<?php

use App\Http\Controllers\Api\CepController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/cep/{cep}', [CepController::class, 'show'])->name('api.cep');