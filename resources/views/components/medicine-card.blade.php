<div class="card fade-in">
    <a id="medicamento-link" href="medicamentos/{{$medicamento->referencia}}">
        <div class="card-image-container">
            <img
                src="/images/{{ $medicamento->imagem }}"
                alt="Imagem do medicamento"
                class="card-image"
            >
        </div>
    </a>
    <div class="card-content-wrapper">
        <div class="card-content">
            <div class="carta-head">
                <h3 class="card-title">{{ $medicamento->nome }}</h3>
            </div>
            <p class="description-text">{{ $medicamento->descricao }}</p>
        </div>

        <div class="card-footer">
            <div class="card-price">
                <span class="price-amount">€ {{ $medicamento->preco }}</span>
                <span class="price-unit">/ unidade</span>

                @if ($medicamento->quantidade <= 0)
                    <span class="price-unit out-of-stock">Esgotado</span>
                @else
                    <span class="price-unit in-stock">Em stock</span>
                @endif
            </div>
            <form action="{{ route('carrinho.add', $medicamento->referencia ) }}" method="post">
                @csrf
                <input type="hidden" name="quantidade" value="1">
                <button type="submit" class="add-button" aria-label="Adicionar {{ $medicamento->nome }} aos favoritos">
                    Adicionar ao carrinho
                </button>
            </form>
        </div>
    </div>
</div>





<style>
    .card {
        width: 288px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        background: white;
        font-family: 'Arial', sans-serif;
        transition: transform 0.2s ease-in-out;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin-bottom: 5%;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeIn 0.5s ease-out forwards;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card-content-wrapper {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-content {
        padding: 16px;
        flex-grow: 1;
        height: 80px;
    }

    .carta-head {
        margin-bottom: 8px;
    }

    .card-title {
        font-weight: 600;
        font-size: 16px;
        margin: 0;
        color: #333;
    }

    .description-text {
        font-size: 14px;
        color: #666;
        margin: 0 0 12px 0;
        line-height: 1.4;
    }

    .card-price {
        display: flex;
        align-items: baseline;
        margin-left: 10px;
        margin-bottom: 10px;
        margin-top: -10px;
        gap: 4px;
    }

    .price-amount {
        font-weight: 600;
        font-size: 18px;
        color: #149FA8;
    }

    .price-unit {
        font-size: 14px;
        color: #717171;
    }

    .add-button {
        width: 100%;
        padding: 12px 16px;
        background: #149FA8;
        color: white;
        border: none;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s ease;
        margin-top: auto;
    }

    .add-button:hover {
        background: #118891;
    }

    .add-button:focus {
        outline: none;
        background: #0F767E;
    }

    #medicamento-link {
        text-decoration: none;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    #medicamento-link:hover {
        cursor: pointer;
    }

    .price-unit.out-of-stock {
        color: #FF0000;
        margin-left: 29.99%;
    }

    .price-unit.in-stock {
        color: #00FF00;
        margin-left: 29.99%;
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
        z-index: 0;
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
