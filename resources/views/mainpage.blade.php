@extends('layouts.main')

@section('title', 'Página Inicial')

@section('content')

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



    @media (max-width: 600px) {
        .alerta {
            top: 1rem;
            right: 1rem;
            padding: 0.8rem 1.5rem;
            font-size: 0.875rem;
        }
    }

</style>
