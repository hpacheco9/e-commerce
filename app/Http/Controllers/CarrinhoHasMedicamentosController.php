<?php

namespace App\Http\Controllers;

use App\Models\CarrinhoHasMedicamento;
use Illuminate\Http\Request;

class CarrinhoHasMedicamentosController extends Controller
{


    public function addOrCreate(Request $request, $userEmail, $referencia, $quantidade)
    {
        CarrinhoHasMedicamento::updateOrCreateByCompositeKey(
            $userEmail,
            $referencia,
            $quantidade
        );

        return redirect("medicamentos/{$referencia}");
    }
}
