<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\CarrinhoHasMedicamento;
use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function pagamento(Request $request)
    {
        $data = date('Y-m-d H:i:s');
        $userEmail = Auth::user()->email;
        $total = $request->input('total');
        $produtos = $request->input('items');


        $compra = Compra::where('user_email', $userEmail)->where('data', $data)->first();
        if ($compra) {
            return redirect()->route('compra.index')->with('error', 'Compra já realizada hoje');
        } else {
            $compra = Compra::create([
                'total' => $total,
                'data' => $data,
                'user_email' => $userEmail,
            ]);

            CarrinhoHasMedicamento::where('user_email', $userEmail)->delete();


            return redirect()->route('compra.addOrCreate', [
                'user_email' => $userEmail,
                'items' => $produtos,
                'data' => $data,
                'compra_id' => $compra->id
            ]);
        }
    }
}
