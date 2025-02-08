<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Detalhes do produto</h2>
    <!-- Botão Voltar -->
    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Voltar</a>

    <!-- Card com Detalhes do product -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->nome }}</h5>

            <!-- Informações Básicas -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Categoria:</strong> {{ $product->categoria }}
                </div>
                <div class="col-md-6">
                    <strong>Marca:</strong> {{ $product->marca ?? 'N/A' }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Unidade de Medida:</strong> {{ $product->unidade_medida }}
                </div>
                <div class="col-md-6">
                    <strong>Preço de Venda:</strong> R$ {{ number_format($product->preco_venda, 2, ',', '.') }}
                </div>
            </div>

            <!-- Preços e Estoque -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Estoque Atual:</strong> {{ $product->estoque_atual }}
                </div>
                <div class="col-md-4">
                    <strong>Estoque Mínimo:</strong> {{ $product->estoque_minimo ?? 'N/A' }}
                </div>
                <div class="col-md-4">
                    <strong>Estoque Máximo:</strong> {{ $product->estoque_maximo ?? 'N/A' }}
                </div>
            </div>

            <!-- Dimensões e Peso -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <strong>Peso:</strong> {{ $product->peso ? $product->peso . 'g' : 'N/A' }}
                </div>
                <div class="col-md-3">
                    <strong>Altura:</strong> {{ $product->altura ? $product->altura . 'cm' : 'N/A' }}
                </div>
                <div class="col-md-3">
                    <strong>Largura:</strong> {{ $product->largura ? $product->largura . 'cm' : 'N/A' }}
                </div>
                <div class="col-md-3">
                    <strong>Comprimento:</strong> {{ $product->comprimento ? $product->comprimento . 'cm' : 'N/A' }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Volume:</strong> {{ $product->volume ? $product->volume . 'L' : 'N/A' }}
                </div>
            </div>

            <!-- Identificação -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Código de Barras:</strong> {{ $product->codigo_barras }}
                </div>
                <div class="col-md-6">
                    <strong>SKU:</strong> {{ $product->sku }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>NCM:</strong> {{ $product->ncm ?? 'N/A' }}
                </div>
            </div>

            <!-- Tributação -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>ICMS:</strong> {{ $product->icms ? $product->icms . '%' : 'N/A' }}
                </div>
                <div class="col-md-4">
                    <strong>IPI:</strong> {{ $product->ipi ? $product->ipi . '%' : 'N/A' }}
                </div>
                <div class="col-md-4">
                    <strong>PIS/COFINS:</strong> {{ $product->pis_cofins ? $product->pis_cofins . '%' : 'N/A' }}
                </div>
            </div>

            <!-- Fornecedores -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Fornecedor:</strong> {{ $product->fornecedor ?? 'N/A' }}
                </div>
                <div class="col-md-6">
                    <strong>Tempo de Reposição:</strong> {{ $product->tempo_reposicao ? $product->tempo_reposicao . ' dias' : 'N/A' }}
                </div>
            </div>

            <!-- Datas -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Data de Fabricação:</strong> {{ $product->data_fabricacao ? \Carbon\Carbon::parse($product->data_fabricacao)->format('d/m/Y') : 'N/A' }}
                </div>
                <div class="col-md-4">
                    <strong>Data de Validade:</strong> {{ $product->data_validade ? \Carbon\Carbon::parse($product->data_validade)->format('d/m/Y') : 'N/A' }}
                </div>
                <div class="col-md-4">
                    <strong>Data de Entrada no Estoque:</strong> {{ $product->data_entrada_estoque ? \Carbon\Carbon::parse($product->data_entrada_estoque)->format('d/m/Y') : 'N/A' }}
                </div>
            </div>

            <!-- Promoções -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Promoção Ativa:</strong> {{ $product->promocao_ativa ? 'Sim' : 'Não' }}
                </div>
                <div class="col-md-6">
                    <strong>Preço Promocional:</strong> {{ $product->preco_promocional ? 'R$ ' . number_format($product->preco_promocional, 2, ',', '.') : 'N/A' }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Data de Início da Promoção:</strong> {{ $product->data_inicio_promocao ? \Carbon\Carbon::parse($product->data_inicio_promocao)->format('d/m/Y') : 'N/A' }}
                </div>
                <div class="col-md-6">
                    <strong>Data de Fim da Promoção:</strong> {{ $product->data_fim_promocao ? \Carbon\Carbon::parse($product->data_fim_promocao)->format('d/m/Y') : 'N/A' }}
                </div>
            </div>

            <!-- Outras Informações -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Garantia:</strong> {{ $product->garantia ? $product->garantia . ' meses' : 'N/A' }}
                </div>
                <div class="col-md-6">
                    <strong>Status:</strong> {{ ucfirst($product->status) }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <strong>Imagem:</strong>
                    @if ($product->imagem)
                        <img src="{{ asset($product->imagem) }}" alt="{{ $product->nome }}" class="img-fluid" style="max-width: 200px;">
                    @else
                        N/A
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <strong>Observações:</strong>
                    <p>{{ $product->observacoes ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
