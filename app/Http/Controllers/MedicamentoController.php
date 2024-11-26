<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index(Request $request, $limit = 10, $view = 'mainpage')
    {
        $page = max(1, $request->input('page', 1));
        $search = $request->input('search');
        $maxPrice = $request->input('price');

        $query = Medicamento::query();

        if ($search) {
            $query->where('nome', 'like', $search . '%');
        }

        if ($maxPrice) {
            $query->where('preco', '<=', $maxPrice);
        }

        $totalMedicamentos = $query->count();

        $totalPages = max(1, ceil($totalMedicamentos / $limit));
        $page = min($page, $totalPages);
        $offset = ($page - 1) * $limit;

        $medicamentos = $query->skip($offset)->take($limit)->get();

        $hasMore = ($page < $totalPages);

        $range = 2;
        $start = max(1, $page - $range);
        $end = min($totalPages, $page + $range);

        return view($view, [
            'medicamentos' => $medicamentos,
            'page' => $page,
            'hasMore' => $hasMore,
            'totalPages' => $totalPages,
            'search' => $search,
            'start' => $start,
            'preco' => $maxPrice,
            'end' => $end,
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

        return redirect()->back()->with('success', 'Medicamento atualizado com sucesso');
    }

    public function store(Request $request)
    {
        $request->validate([
            'referencia' => 'required|unique:medicamentos,referencia'
        ], [
            'referencia.unique' => 'Já existe um medicamento com esta referencia'
        ]);

        $medicamento = new Medicamento();
        $medicamento->referencia = $request->referencia;
        $medicamento->nome = $request->nome;
        $medicamento->dosagem = $request->dosagem;
        $medicamento->forma = $request->forma;
        $medicamento->quantidade = $request->quantidade;
        $medicamento->industria = $request->industria;
        $medicamento->preco = $request->preco;
        $medicamento->descricao = $request->descricao;
        $medicamento->imagem = "medicine-placeholder.svg";

        $medicamento->save();

        return redirect()->back()->with('success', 'Medicamento adicionado com sucesso');
    }

    public function show($referencia)
    {
        $medicamento = Medicamento::where('referencia', $referencia)->firstOrFail();
        return view('medicamento', ['medicamento' => $medicamento]);
    }
}
