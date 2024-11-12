<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index(Request $request, $limit = 10, $view = 'welcome')
    {
        $page = max(1, $request->input('page', 1)); // Ensure page is at least 1
        $search = $request->input('search');

        // Get total count first
        if ($search) {
            $totalMedicamentos = Medicamento::where('nome', 'like', $search . '%')->count();
        } else {
            $totalMedicamentos = Medicamento::count();
        }

        // Calculate total pages
        $totalPages = max(1, ceil($totalMedicamentos / $limit));

        // Adjust current page if it exceeds total pages
        $page = min($page, $totalPages);

        // Calculate offset after page adjustment
        $offset = ($page - 1) * $limit;

        // Get paginated results
        if ($search) {
            $medicamentos = Medicamento::where('nome', 'like', $search . '%')
                ->skip($offset)
                ->take($limit)
                ->get();
        } else {
            $medicamentos = Medicamento::skip($offset)
                ->take($limit)
                ->get();
        }

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
