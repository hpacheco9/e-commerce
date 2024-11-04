<div class="card">
    <div class="card-image-container">
        <img
            src="/images/{{ $medicamento->imagem }}"
            alt="Imagem do medicamento"
            class="card-image"
        >
    </div>
    <div class="card-content">
        <div class="carta-head">
            <h3 class="card-title">{{ $medicamento->nome }}</h3>
        </div>
        <div class="card-description">
            <p class="description-text">{{ $medicamento->descricao }}</p>
            <div class="card-price">
                <span class="price-amount">€ {{ $medicamento->preco }}</span>
                <span class="price-unit">/ unidade</span>
            </div>
        </div>
    </div>
    <button class="add-button" aria-label="Adicionar {{ $medicamento->nome }} aos favoritos">
        Adicionar ao carrinho
    </button>
</div>

<style>
    .card {
        width: 288px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        background: white;
        font-family: 'Arial', sans-serif;
        transition: transform 0.2s ease-in-out;
    }

    .card-image-container {
        width: 100%;
        height: 192px;
    }

    .card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-content {
        padding: 16px;
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
    }

    .add-button:hover {
        background: #118891;
    }

    .add-button:focus {
        outline: none;
        background: #0F767E;
    }
</style>
