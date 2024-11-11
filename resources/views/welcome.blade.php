@extends('layouts.main')

@section('title', 'Test page')

@section('content')
    <div class="container">
        @foreach ($medicamentos as $medicamento)
            <x-medicine-card :medicamento="$medicamento" />
        @endforeach
    </div>

    <div class="pagination-controls">
        <!-- Previous Button -->
        @if($page > 1)
            <a class="button" href="?page={{ $page - 1 }}&search={{ $search }}">Anterior</a>
        @endif

        <!-- Page Number Links -->
        @for($i = 1; $i <= $totalPages; $i++)
            @if($i == $page)
                <span class="button active">{{ $i }}</span> <!-- Active page -->
            @else
                <a class="button" href="?page={{ $i }}&search={{ $search }}">{{ $i }}</a>
            @endif
        @endfor

        <!-- Next Button -->
        @if($hasMore)
            <a class="button" href="?page={{ $page + 1 }}&search={{ $search }}">Avançar</a>
        @endif
    </div>
@endsection

<style>
    .container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(288px, 1fr));
        gap: 1rem;
        padding: 1rem;
        max-width: 1800px;
        margin: 0 auto;
        justify-items: center;
    }

    .pagination-controls {
        display: flex;
        justify-content: center; /* Center the buttons without gaps */
        align-items: center; /* Vertically align buttons */
        margin-top: 20px; /* Space above the buttons */
        gap: 10px;
    }

    .button {
        display: flex;
        z-index: 1;
        overflow: hidden;
        text-decoration: none;
        font-family: sans-serif;
        font-weight: 600;
        font-size: 1em;
        padding: 0.75em 1em;
        color: rgb(53, 161, 168, 0.75);
        transition: 4s;
        margin: 0;
        position: relative;
    }
    .button::before,
    .button::after {
        content: '';
        position: absolute;
        top: -1.5em;
        z-index: -1;
        width: 200%;
        aspect-ratio: 1;
        border-radius: 40%;
        background-color: rgba(53, 161, 168, 0.25);
        transition: 2s;
    }

    .button::before {
        left: -80%;
        transform: translate3d(0, 5em, 0) rotate(-340deg);
    }

    .button::after {
        right: -80%;
        transform: translate3d(0, 5em, 0) rotate(390deg);
    }

    .button:hover,
    .button:focus {
        color: white;
        cursor: pointer;
    }
    .button.active {
        color: rgba(53, 161, 168, 1);
    }

    .button:hover::before,
    .button:hover::after,
    .button:focus::before,
    .button:focus::after {
        transform: none;
        background-color: rgba(53, 161, 168, 0.75);
    }

</style>
