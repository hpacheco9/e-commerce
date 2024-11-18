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

        return redirect()->back();
    }

    public function updateQuantity(Request $request)
    {
        $action = $request->input('action');
        $referencia = $request->input('medicamento_referencia');
        $quantidade = $request->input('quantidade');

        $quantidadeCarrinho = $quantidade;

        if ($action === 'increase' ) {
            $quantidadeCarrinho += 1;
        } elseif ($action === 'decrease' && $quantidade > 1) {
            $quantidadeCarrinho -= 1;
        } else {
            $quantidadeCarrinho = max($quantidade, 1);
        }


        CarrinhoHasMedicamento::updateOrCreateByCompositeKey(
            Auth::user()->email,
            $referencia,
            $quantidadeCarrinho
        );

        return redirect()->back();
    }


    public function removeItem(Request $request)
    {
        $referencia = $request->input('medicamento_referencia');

        CarrinhoHasMedicamento::deleteByCompositeKey(Auth::user()->email, $referencia);


        return redirect()->back();
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
