<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\User;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index()
    {
        $todos = Medicamento::all();
        return view('welcome', ['medicamentos' => $todos]);
    }
}
