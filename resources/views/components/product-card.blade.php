<div class="container">
    <div class="cartao-produto">
        <div class="produto-grelha">
            <div class="produto-imagem">
                <div class="imagem-container">
                    @if($medicamento->imagem)
                        <img src="/images/{{ $medicamento->imagem }}" alt="{{ $medicamento->nome }}">
                    @else
                        <img src="/images/medicine-placeholder.svg" alt="{{ $medicamento->nome }}">
                    @endif
                </div>
            </div>
            <div class="produto-info">
                <div class="produto-cabecalho">
                    <div>
                        <h1 class="titulo-produto">{{ $medicamento->nome }}</h1>
                        <div class="preco">€{{ number_format($medicamento->preco, 2, ',', '.') }}</div>
                    </div>
                    <span class="etiqueta-stock">Em stock</span>
                </div>
                <div class="cartao-detalhes">
                    <div class="detalhe-item">
                        <span>{{ $medicamento->descricao }}</span>
                    </div>
                    <div class="detalhe-item">
                        <span class="etiqueta-detalhe">Dosagem:</span>
                        <span>{{ $medicamento->dosagem }}</span>
                    </div>
                    <div class="detalhe-item">
                        <span class="etiqueta-detalhe">Forma:</span>
                        <span>{{ $medicamento->forma }}</span>
                    </div>
                    <div class="detalhe-item">
                        <span class="etiqueta-detalhe">Referência:</span>
                        <span>{{ $medicamento->referencia }}</span>
                    </div>
                </div>
                <div class="seletor-quantidade">
                    <button id="decremento" class="botao-quantidade" onclick="alterarQuantidade(-1)">-</button>
                    <input type="number" class="input-quantidade" id="quantidade" value="1" min="1" readonly>
                    <button class="botao-quantidade" onclick="alterarQuantidade(1)">+</button>
                </div>
                <button class="botao-comprar" onclick="comprarProduto()">Comprar agora</button>
            </div>
        </div>
    </div>
    <div class="alerta" id="alerta">Produto adicionado ao carrinho com sucesso!</div>
</div>

<script>
    function alterarQuantidade(valor) {
        let inputQuantidade = document.getElementById('quantidade');
        let quantidadeAtual = parseInt(inputQuantidade.value);
        let novaQuantidade = quantidadeAtual + valor;


        if (novaQuantidade <= 1) {
            novaQuantidade = 1;
            document.getElementById('decremento').style.cursor = 'not-allowed';
        } else {
            document.getElementById('decremento').style.cursor = 'pointer';
        }

        inputQuantidade.value = novaQuantidade;
    }

    function comprarProduto() {
        let alerta = document.getElementById('alerta');
        alerta.classList.add('show');

        // Remover o alerta após 2 segundos
        setTimeout(() => {
            alerta.classList.remove('show');
        }, 2000);
    }
</script>

<style>
    .container {
        max-width: 1000px;
        margin: 2.5rem auto;
        padding: 0 1rem;
    }
    .cartao-produto {
        background: white;
        border-radius: 14px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .produto-grelha {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    @media (max-width: 768px) {
        .produto-grelha {
            grid-template-columns: 1fr;
        }
    }

    .produto-imagem {
        background-color: #e3f5f7;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 300px;
    }

    .imagem-container {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .produto-imagem img {
        width: 100%;
        max-width: 280px;
        height: auto;
    }

    .produto-info {
        padding: 1.5rem;
    }

    .produto-cabecalho {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1rem;
    }

    .titulo-produto {
        font-size: 1.75rem;
        color: #149FA8;
        margin-bottom: 0.5rem;
    }

    .etiqueta-stock {
        background-color: #e3f5f7;
        color: #149FA8;
        padding: 0.5rem 1rem;
        border-radius: 16px;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .preco {
        font-size: 1.5rem;
        color: black;
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .cartao-detalhes {
        background-color: #f1f9fa;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
    }

    .detalhe-item {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 0.75rem;
    }

    .detalhe-item:last-child {
        margin-bottom: 0;
    }

    .etiqueta-detalhe {
        font-weight: 600;
        color: #149FA8;
        min-width: 80px;
    }

    .seletor-quantidade {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .botao-quantidade {
        background-color: #f1f9fa;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        width: 35px;
        height: 35px;
        font-size: 1.25rem;
        cursor: pointer;
    }

    .botao-quantidade[disabled] {
        cursor: not-allowed;
    }

    .input-quantidade {
        width: 50px;
        height: 35px;
        text-align: center;
        font-size: 1.125rem;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
    }

    .botao-comprar {
        width: 100%;
        background-color: #149FA8;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.8rem;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
    }

    .botao-comprar:hover {
        background-color: #117e86;
    }

    .alerta {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        background-color: #e3f5f7;
        color: #149FA8;
        padding: 1rem 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transform: translateY(200%);
        transition: transform 0.3s ease-out;
        opacity: 0;
    }

    .alerta.show {
        transform: translateY(-200px);
        opacity: 1;

    }
</style>
