@extends('layouts.main')

@section('title', 'Página Inicial')

@section('content')
    <div class="filter-container">
        <div class="filter-wrapper">
            <select id="sortFilter" class="sort-filter">
                <option value="">Ordenar por</option>
                <option value="price_asc">Preço: Menor para Maior</option>
                <option value="price_desc">Preço: Maior para Menor</option>
                <option value="name_asc">Nome: A-Z</option>
                <option value="name_desc">Nome: Z-A</option>
            </select>
            <div class="filter-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" y1="12" x2="20" y2="12"></line>
                    <line x1="4" y1="6" x2="20" y2="6"></line>
                    <line x1="4" y1="18" x2="20" y2="18"></line>
                </svg>
            </div>
        </div>
    </div>

    @if(count($medicamentos) > 0)
        <div class="container">
            @foreach ($medicamentos as $medicamento)
                <x-medicine-card :medicamento="$medicamento" />
            @endforeach
        </div>
    @else
        <div class="cont2">
            <h2>Não foram encontrados medicamentos</h2>
        </div>
    @endif

    <div class="pagination-controls">
        @if(count($medicamentos) > 0)
            @if($page > 1)
                <a class="button" href="?page={{ $page - 1 }}&search={{ $search }}">Anterior</a>
            @endif

            @for($i = $start; $i <= $end; $i++)
                @if($i == $page)
                    <span class="button active">{{ $i }}</span>
                @else
                    <a class="button" href="?page={{ $i }}&search={{ $search }}">{{ $i }}</a>
                @endif
            @endfor

            @if($hasMore)
                <a class="button" href="?page={{ $page + 1 }}&search={{ $search }}">Avançar</a>
            @endif
        @endif
    </div>

    @if (session('success'))
        <div class="alerta" id="alerta">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alerta" id="alerta" style="background-color: red; color: white">{{ session('error') }}</div>
    @endif
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const alerta = document.getElementById("alerta");
        if (alerta) {
            setTimeout(() => {
                alerta.style.opacity = '0';
                alerta.style.transform = 'translateY(-20px)';
                setTimeout(() => alerta.remove(), 300);
            }, 1500);
        }
    });
</script>

<style>
    .filter-container {
        display: flex;
        justify-content: flex-end;
        padding: 1rem;
        max-width: 1800px;
        margin: 0 auto;
    }

    .sort-filter {
        padding: 0.5rem 1rem;
        border: 2px solid rgba(53, 161, 168, 0.5);
        border-radius: 4px;
        background-color: white;
        font-size: 1rem;
        color: #35a1a8;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .sort-filter:hover {
        border-color: rgba(53, 161, 168, 0.8);
        box-shadow: 0 2px 4px rgba(53, 161, 168, 0.2);
    }

    .sort-filter:focus {
        outline: none;
        border-color: #35a1a8;
        box-shadow: 0 0 0 2px rgba(53, 161, 168, 0.2);
    }

    .container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(288px, 1fr));
        gap: 1rem;
        padding: 1rem;
        max-width: 1800px;
        margin: 0 auto;
        justify-items: center;
    }
    h2 {
        text-align: center;
        color: #808080;
    }
    .cont2 {
        display: flex;
        justify-content: center;
        left: 50%;
        align-items: center;
        margin-top: 15%;
    }

    .pagination-controls {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
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
        border-radius: 25%;
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
    .alerta {
        position: fixed;
        top: 2rem;
        right: 2rem;
        transform: translateY(0);
        max-width: 300px;
        width: 90%;
        background-color: #e3f5f7;
        color: #149FA8;
        padding: 1rem 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: visibility 0.3s, opacity 0.3s, transform 0.3s;
        z-index: 1000;
    }

    .filter-container {
        display: flex;
        justify-content: flex-end;
        padding: 1rem;
        max-width: 1800px;
        margin: 0 auto;
        margin-right: 2%;
    }

    .filter-wrapper {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        position: relative;
    }

    .sort-filter {
        appearance: none;
        -webkit-appearance: none;
        padding: 0.5rem 2.5rem 0.5rem 1rem;
        border: 2px solid rgba(53, 161, 168, 0.5);
        border-radius: 4px;
        background-color: white;
        font-size: 1rem;
        color: #35a1a8;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-icon {
        position: absolute;
        right: 0.5rem;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        width: 1.5rem;
        height: 1.5rem;
        color: #35a1a8;
    }

    .sort-filter:hover {
        border-color: rgba(53, 161, 168, 0.8);
        box-shadow: 0 2px 4px rgba(53, 161, 168, 0.2);
    }

    .sort-filter:focus {
        outline: none;
        border-color: #35a1a8;
        box-shadow: 0 0 0 2px rgba(53, 161, 168, 0.2);
    }

    @media (max-width: 600px) {
        .filter-container {
            justify-content: center;
            padding: 0.5rem;
        }

        .sort-filter {
            width: 100%;
            max-width: 300px;
        }
    }
</style>

