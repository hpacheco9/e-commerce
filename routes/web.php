<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\UserController;

Route::get('/', [MedicamentoController::class, 'index']);

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::get('dashboard', function() {
    return view('dashboard');
});

Route::post('register', [UserController::class, 'register']);

Route::get('medicamentos/{referencia}', [MedicamentoController::class, 'show']);
Route::get('/medicamentos', [MedicamentoController::class, 'index']);

Route::post('login', [UserController::class, 'login']);

Route::get('logout', [UserController::class, 'logout']);




