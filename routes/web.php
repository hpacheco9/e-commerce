<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\UserController;

// Route::get('/', [MedicamentoController::class, 'index'])->with($view, "welcome");

Route::get('/', function () {
    return (new MedicamentoController)->index(request(), 10, 'welcome');
});

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

// Route::get('dashboard', [MedicamentoController::class, 'index'])->with($view, "dashboard");

Route::get('dashboard', function () {
    return (new MedicamentoController)->index(request(), 20, 'dashboard');
});

Route::post('register', [UserController::class, 'register']);

Route::get('medicamentos/{referencia}', [MedicamentoController::class, 'show']);


Route::post('login', [UserController::class, 'login']);

Route::get('logout', [UserController::class, 'logout']);




