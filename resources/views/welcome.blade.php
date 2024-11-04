@extends('layouts.main')

@section('title', 'Test page')

@section('content')
    <div class="container">


        @foreach ($medicamentos as $medicamento)
            <a id="medicamento-link" href="medicamentos/{{$medicamento->referencia}}">

            <x-medicine-card :medicamento="$medicamento" />
            </a>
        @endforeach


    </div>

@endsection

<style>
    .container {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 40px;
        padding: 20px;
        margin: 0 auto;
    }

    #medicamento-link {
        text-decoration: none;
    }

    #medicamento-link:hover {
        cursor: pointer;
    }
</style>
