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
        grid-template-columns: repeat(auto-fill, minmax(288px, 1fr));
        gap: 1rem;
        padding: 1rem;
        max-width: 1800px; /* Set a maximum width for better centering */
        margin: 0 auto; /* Center the container horizontally */
        justify-items: center; /* Center items in the grid */
    }
</style>
