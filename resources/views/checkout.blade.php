@extends('layouts.checkout')

@section('title', 'Checkout')

@section('content')

<div class="container">
    <h1>Finalizar Compra</h1>
    <div class="checkout-grid">
        <div class="card">
            <h2>Detalhes de Faturação</h2>
            <form>
                <div class="form-group">
                    <label for="firstName">Nome</label>
                    <input type="text" id="firstName" name="firstName" value="{{Auth::user()->name}}" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="{{Auth::user()->email}}" required>
                </div>
                <div class="form-group">
                    <label for="address">Morada</label>
                    <input type="text" id="address" name="address" value="{{Auth::user()->rua}}}" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="city">Cidade</label>
                        <input type="text" id="city" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="zip">Código Postal</label>
                        <input type="text" id="zip" name="zip" value="{{Auth::user()->codigoPostal}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="country">País</label>
                    <select id="country" name="country" required>
                        <option value="">Selecione um país</option>
                        <option value="pt">Portugal</option>
                        <option value="br">Brasil</option>
                        <option value="es">Espanha</option>
                        <option value="fr">França</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="card">Número do Cartão</label>
                    <input type="text" id="card" name="card" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="expiry">Data de Validade</label>
                        <input type="text" id="expiry" name="expiry" placeholder="MM/AA" required>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" required>
                    </div>
                </div>
            </form>
        </div>
        <div class="card">
            <h2>Resumo do Pedido</h2>
            <div class="product-item">
                <div class="product-details">
                    <h3>Produto 1</h3>
                    <p class="product-quantity">Quantidade: 2</p>
                </div>
                <div class="product-price">39,98 €</div>
            </div>
            <div class="product-item">
                <div class="product-details">
                    <h3>Produto 2</h3>
                    <p class="product-quantity">Quantidade: 1</p>
                </div>
                <div class="product-price">29,99 €</div>
            </div>
            <div class="product-item">
                <div class="product-details">
                    <h3>Produto 3</h3>
                    <p class="product-quantity">Quantidade: 1</p>
                </div>
                <div class="product-price">39,99 €</div>
            </div>
            <div class="order-total">
                <div class="order-total-row">
                    <span>Subtotal</span>
                    <span>109,96 €</span>
                </div>
                <div class="order-total-row">
                    <span>IVA (23%)</span>
                    <span>25,29 €</span>
                </div>
                <div class="order-total-row final">
                    <span>Total</span>
                    <span>135,25 €</span>
                </div>
            </div>
            <button class="btn">Finalizar Compra</button>
        </div>
    </div>
</div>
@endsection


<style>
    :root {
        --primary-color: #149FA8;
        --primary-hover: #0C6A70;
        --background-color: #f3f4f6;
        --card-background: #ffffff;
        --text-color: #1f2937;
        --text-muted: #6b7280;
        --border-color: #e5e7eb;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Inter', sans-serif;
        line-height: 1.5;
        color: var(--text-color);
        background-color: var(--background-color);
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 40px;
        font-weight: 600;
        font-size: 2.5rem;
        color: var(--primary-color);
    }

    .checkout-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 30px;
    }

    @media (min-width: 768px) {
        .checkout-grid {
            grid-template-columns: 3fr 2fr;
        }
    }

    .card {
        background-color: var(--card-background);
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 30px;
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .card h2 {
        margin-bottom: 25px;
        font-weight: 600;
        font-size: 1.5rem;
        color: var(--primary-color);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
    }

    input, select {
        width: 100%;
        padding: 10px;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    input:focus, select:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.1);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }

    @media (min-width: 480px) {
        .form-row {
            grid-template-columns: 1fr 1fr;
        }
    }

    .btn {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: var(--primary-color);
        color: #ffffff;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: var(--primary-hover);
    }

    .product-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--border-color);
    }

    .product-item:last-child {
        border-bottom: none;
    }

    .product-details h3 {
        font-size: 1rem;
        font-weight: 500;
        margin-bottom: 4px;
    }

    .product-quantity {
        color: var(--text-muted);
        font-size: 0.875rem;
    }

    .product-price {
        font-weight: 500;
    }

    .order-total {
        margin-top: 25px;
        border-top: 2px solid var(--border-color);
        padding-top: 15px;
    }

    .order-total-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .order-total-row.final {
        font-weight: 600;
        font-size: 1.125rem;
        color: var(--primary-color);
        margin-top: 10px;
    }
</style>

