<?php

use App\Http\Controllers\CarrinhoHasMedicamentosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Middleware\IsAdmin;


Route::get('/', function () {
    return (new MedicamentoController)->index(request(), 10, 'mainpage');
});

Route::get('login', function () {
    return view('login');
})->name('login');


Route::post('login', [UserController::class, 'login']);

Route::get('register', function () {
    return view('register');
});

Route::get('dashboard', function () {
    return (new MedicamentoController)->index(request(), 20, 'dashboard');
})->middleware(['auth', IsAdmin::class]);

Route::post('register', [UserController::class, 'register']);

Route::get('medicamentos/{referencia}', [MedicamentoController::class, 'show']);
Route::get('/medicamentos', [MedicamentoController::class, 'index']);
Route::delete('/medicamentos/{referencia}', [MedicamentoController::class, 'destroy'])->name('medicamentos.destroy');


Route::post('/create', [MedicamentoController::class, 'create']);


Route::patch('/medicamentos/{referencia}', [MedicamentoController::class, 'update'])->name('medicamentos.update');



Route::get('logout', [UserController::class, 'logout']);

Route::post('carrinho/{referencia}', [CarrinhoController::class, 'add'])
    ->name('carrinho.add')
    ->middleware('auth');


Route::get('/carrinho/addOrCreate', [CarrinhoHasMedicamentosController::class, 'addOrCreate'])->name('carrinho.addOrCreate')->middleware('auth');

