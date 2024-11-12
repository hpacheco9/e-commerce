<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;

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

//Route::get('dashboard', function () {
//    return (new MedicamentoController)->index(request(), 20, 'dashboard');
//});

Route::get('dashboard', function () {
    return (new MedicamentoController)->index(request(), 20, 'dashboard');
})->middleware(['auth', IsAdmin::class]);

Route::post('register', [UserController::class, 'register']);

Route::get('medicamentos/{referencia}', [MedicamentoController::class, 'show']);
Route::get('/medicamentos', [MedicamentoController::class, 'index']);
Route::delete('/medicamentos/{referencia}', [MedicamentoController::class, 'destroy'])->name('medicamentos.destroy');


Route::post('/create', [MedicamentoController::class, 'create']);

//Route::patch('/update/{referencia}', [MedicamentoController::class, 'update'])->name('medicamentos.update');

Route::patch('/medicamentos/{referencia}', [MedicamentoController::class, 'update'])->name('medicamentos.update');





/*
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', function () {
        return (new MedicamentoController)->index(request(), 20, 'dashboard');
    });

    // Route::get('logout', [UserController::class, 'logout']);
});
*/


Route::post('login', [UserController::class, 'login']);

Route::get('logout', [UserController::class, 'logout']);




