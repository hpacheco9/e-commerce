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
            // Filtered search results
            $medicamentos = Medicamento::where('nome', 'like', '%' . $search . '%')
                ->skip($offset)
                ->take($limit)
                ->get();
            $totalMedicamentos = Medicamento::where('nome', 'like', '%' . $search . '%')->count();
        } else {
            // Unfiltered results
            $medicamentos = Medicamento::skip($offset)
                ->take($limit)
                ->get();
            $totalMedicamentos = Medicamento::count();
        }

        // Calculate total pages
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


    public function show($referencia)
    {
        $medicamento = Medicamento::where('referencia', $referencia)->firstOrFail();
        return view('medicamento', ['medicamento' => $medicamento]);
    }
}
