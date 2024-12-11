<?php

namespace App\Http\Controllers;

use App\Models\CompraHasMedicamento;
use Illuminate\Http\Request;

class CompraHasMedicamentosController extends Controller
{
    public function addOrCreate(Request $request)
    {
        $userEmail = $request['user_email'];
        $items = json_decode($request['items']);
        $data = $request['data'];
        $compraId = $request['compra_id'];



        foreach ($items as $item) {
            $validate = CompraHasMedicamento::createByCompositeKey(
                $item->medicamento->referencia,
                $item->quantidade,
                $compraId
            );
        }

        if (!$validate) {
            return view('status')->with('error', 'Quantidade indisponível');
        }

        return view('status')->with('success', 'Item adicionado ao carrinho com sucesso');
    }
}
