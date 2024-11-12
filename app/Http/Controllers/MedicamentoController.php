<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index(Request $request, $limit = 10, $view="welcome")
    {
        $page = $request->input('page', 1);
        $offset = ($page - 1) * $limit;
        $search = $request->input('search');
        if ($search) {
            $medicamentos = Medicamento::where('nome', 'like',  $search . '%' )
                ->skip($offset)
                ->take($limit)
                ->get();
            $totalMedicamentos = Medicamento::where('nome', 'like', '%' . $search . '%')->count();
        } else {
            $medicamentos = Medicamento::skip($offset)
                ->take($limit)
                ->get();
            $totalMedicamentos = Medicamento::count();
        }

        $totalPages = ceil($totalMedicamentos / $limit);
        $hasMore = ($page < $totalPages);

        return view($view, [
            'medicamentos' => $medicamentos,
            'page' => $page,
            'hasMore' => $hasMore,
            'totalPages' => $totalPages,
            'search' => $search,
        ]);
    }

    public function destroy($referencia)
    {

        Medicamento::where('referencia', $referencia)->delete();

        return redirect("/dashboard");
    }

    public function update(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|integer',
            'industria' => 'required|string|max:255',
            'forma' => 'required|string|max:150',
            'dosagem' => 'required|string|max:150',
            'descricao' => 'required|string|max:255',
            'preco' => 'required'
        ]);

        $medicamento = Medicamento::where('referencia', $request->referencia)->firstOrFail();
        $medicamento->nome = $request->input('nome');
        $medicamento->quantidade = $request->input('quantidade');
        $medicamento->industria = $request->input('industria');
        $medicamento->dosagem = $request->input('dosagem');
        $medicamento->preco = $request->input('preco');
        $medicamento->forma = $request->input('forma');
        $medicamento->descricao = $request->input('descricao');
        $medicamento->save();
        return redirect('/dashboard');
    }


    public function show($referencia)
    {
        $medicamento = Medicamento::where('referencia', $referencia)->firstOrFail();
        return view('medicamento', ['medicamento' => $medicamento]);
    }
}
