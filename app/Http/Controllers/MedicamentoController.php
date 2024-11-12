<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index(Request $request, $limit = 10, $view)
    {
        $view = $view;
        $page = $request->input('page', 1);
        $offset = ($page - 1) * $limit;
        $search = $request->input('search');

        if ($search) {
            $medicamentos = Medicamento::where('nome', 'like', '%' . $search . '%')
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

    // Adicionar Post e Patch

    public function create()
    {

    }


    // Pop up na página, para update do medicamento

    public function update(Request $request)
    {
        // Validate the incoming request data

        $request->validate([
            'referencia' => 'required|string',
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|integer',
            'industria' => 'required|string|max:255',
        ]);


        // Find the Medicamento by referencia and update it
        $medicamento = Medicamento::where('nome', $request->referencia)->first();

        // Update fields with the request data
        $medicamento->nome = $request->input('nome');
        $medicamento->quantidade = $request->input('quantidade');
        $medicamento->industria = $request->input('industria');

        // Save the updated Medicamento
        $medicamento->save();

        // Redirect back to the dashboard with a success message
        return redirect('/dashboard');

    }


    public function show($referencia)
    {
        $medicamento = Medicamento::where('referencia', $referencia)->firstOrFail();
        return view('medicamento', ['medicamento' => $medicamento]);
    }
}
