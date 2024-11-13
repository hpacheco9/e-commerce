<?php

namespace App\Http\Controllers;

use App\Models\CarrinhoHasMedicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\error;

class CarrinhoHasMedicamentosController extends Controller
{


    public function addOrCreate(Request $request)

    {
        $userEmail = $request['user_email'];
        $referencia = $request['referencia'];
        $quantidade = $request['quantidade'];


        CarrinhoHasMedicamento::updateOrCreateByCompositeKey(
            $userEmail,
            $referencia,
            $quantidade
        );

        return redirect("medicamentos/{$referencia}");
    }
}
