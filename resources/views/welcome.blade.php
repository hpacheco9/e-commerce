@extends('layouts.main')

@section('title', 'Test page')

@section('content')
    <div class="container">
        @foreach ($medicamentos as $medicamento)
            <x-medicine-card :medicamento="$medicamento" />
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


</style>
