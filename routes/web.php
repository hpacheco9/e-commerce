<?php

use App\Http\Controllers\CarrinhoHasMedicamentosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Middleware\IsAdmin;

// Página inicial


Route::get('/', function () {
    return (new MedicamentoController)->index(request(), 10, 'mainpage');
});

// Autenticação

Route::get('login', function () {
    return view('login');
})->name('login');


Route::post('login', [UserController::class, 'login']);

Route::get('register', function () {
    return view('register');
});

Route::post('register', [UserController::class, 'register']);

Route::get('logout', [UserController::class, 'logout']);

// Medicamentos

Route::get('medicamentos/{referencia}', [MedicamentoController::class, 'show']);
Route::get('/medicamentos', [MedicamentoController::class, 'index']);
Route::delete('/medicamentos/{referencia}', [MedicamentoController::class, 'destroy'])->name('medicamentos.destroy');
Route::post('/create', [MedicamentoController::class, 'store'])->middleware(['auth', IsAdmin::class]);
Route::patch('/medicamentos/{referencia}', [MedicamentoController::class, 'update'])->name('medicamentos.update');


// Admin

Route::get('dashboard', function () {
    return (new MedicamentoController)->index(request(), 20, 'dashboard');
})->middleware(['auth', IsAdmin::class]);


// Carrinho

Route::get('/carrinho' , [CarrinhoHasMedicamentosController::class, 'index'])->name('carrinho.index')->middleware('auth');

Route::post('carrinho/{referencia}', [CarrinhoController::class, 'add'])
    ->name('carrinho.add')
    ->middleware('auth');

Route::get('/carrinho/addOrCreate', [CarrinhoHasMedicamentosController::class, 'addOrCreate'])->name('carrinho.addOrCreate')->middleware('auth');

Route::post('/cart/update', [CarrinhoHasMedicamentosController::class, 'updateQuantity'])->name('cart.update')->middleware('auth');
Route::post('/cart/remove', [CarrinhoHasMedicamentosController::class, 'removeItem'])->name('cart.remove')->middleware('auth');

// Checkout

Route::get('checkout', function () {
    return view('checkout');
});

// Perfil

Route::get("/perfil", [UserController::class, 'show'])->name('perfil.show')->middleware('auth');
Route::put("/perfil/update", [UserController::class, 'update'])->name('perfil.update')->middleware('auth');
Route::post("/perfil/delete_foto", [UserController::class, 'deletePhoto'])->middleware('auth');

// Password
Route::get("/forgot", function () {
    return view('forgot');
});
Route::post("/forgot", [UserController::class, 'forgot']);
