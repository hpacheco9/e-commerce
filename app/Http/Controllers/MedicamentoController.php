<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index()
    {
       $search = request('search');
       if ($search) {
              $medicamentos = Medicamento::where([
                ['nome', 'like', '%' . $search . '%']
              ])->get();
         } else {
              $medicamentos = Medicamento::all();
            }
        return view('welcome', ['medicamentos' => $medicamentos]);
    }
}
