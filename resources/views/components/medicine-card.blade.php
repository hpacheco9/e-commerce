

<style>
    .listing-card {
        width: 288px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        background: white;
        font-family: 'Arial', sans-serif;
    }

    .listing-card__image-container {
        position: relative;
        width: 100%;
        height: 192px;
    }

    .listing-card__image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .listing-add {
        width: 100%;
        padding: 8px 16px;
        background: #149FA8;
        color: white;
        border: none;
        border-radius: 0 0 12px 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
    }



    .listing-card__content {
        padding: 16px;
    }

    .listing-card__header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 4px;
    }

    .listing-card__location {
        font-weight: 600;
        font-size: 16px;
        margin: 0;
    }

    .listing-card__price {
        margin-top: 8px;
    }

    .listing-card__price-amount {
        font-weight: 600;
    }

    .listing-card__price-text {
        color: #717171;
    }
</style>


<div class="listing-card">
    <div class="listing-card__image-container">
        <img
            src="images/medicine-placeholder.svg"
            alt="Nome do medicamento"
            class="listing-card__image"
        >
    </div>
    <div class="listing-card__content">
        <div class="listing-card__header">
            <h3 class="listing-card__location">Nome do medicamento</h3>
        </div>
        <div class="listing-card__description">
            <p>Descrição do medicamento</p>
            <div class="listing-card__price">
                <span class="listing-card__price-amount">€ Preço</span>
                <span class="listing-card__price-text">unidade</span>
            </div>
        </div>
    </div>
        <button class="listing-add" aria-label="Adicionar aos favoritos">
            Adicionar
        </button>
</div>

