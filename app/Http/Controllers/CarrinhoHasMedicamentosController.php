<?php

namespace App\Http\Controllers;

use App\Models\CarrinhoHasMedicamento;
use App\Models\Medicamento;
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

    public function removeItem(Request $request)
    {
        $referencia = $request->input('medicamento_referencia');

        CarrinhoHasMedicamento::deleteByCompositeKey(Auth::user()->email, $referencia);


        return redirect("/carrinho");
    }

    public function index() {

        $carrinho = CarrinhoHasMedicamento::where('user_email', Auth::user()->email)->get();

        $items = [];

        $total = 0;
        foreach ($carrinho as $item) {
            $medicamento = Medicamento::where('referencia', $item->medicamento_referencia)->firstOrFail();
            if ($medicamento) {
                $items[] = [
                    'medicamento' => $medicamento,
                    'quantidade' => $item->quantidade
                ];
                $total += $medicamento->preco * $item->quantidade;
            }
        }



        return view('cart', [
            'items' => $items,
            'total' => $total
        ]);
    }
}
