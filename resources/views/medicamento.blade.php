
@extends('layouts.main')

@section('title', $medicamento->nome)



@section('content')
    <div class="container">
        <div class="medicamento-descricao">
            <h1>{{$medicamento->nome}}</h1>
            <p>{{$medicamento->descricao}}</p>
        </div>
    </div>
@endsection


<style>

    .medicamento-descricao {
        font-size: 1.5rem;
        margin-top: 2rem;
    }


</style>
