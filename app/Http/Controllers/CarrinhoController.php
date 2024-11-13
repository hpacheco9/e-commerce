<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\CarrinhoHasMedicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{

    public function add(Request $request)
    {
        $userEmail = Auth::user()->email;
        $referencia = $request->referencia;
        $quantidade = $request->input('quantidade');

        $carrinho = Carrinho::firstOrCreate(['user_email' => $userEmail]);

        CarrinhoHasMedicamento::updateOrCreateByCompositeKey($userEmail, $referencia, $quantidade);
        return redirect("/medicamentos/{$referencia}");
    }





    public function remove() {

    }

    public function show() {

    }
}
