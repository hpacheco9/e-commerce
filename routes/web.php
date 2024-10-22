<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicamentoController;

Route::get('/', [MedicamentoController::class, 'index']);
