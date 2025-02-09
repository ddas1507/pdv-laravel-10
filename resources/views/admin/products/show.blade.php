@extends('layouts.app')
@section('title','detalhes: '.$product->nome)
@section('content')
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
            </div>

            <!-- Dimensões e Peso -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <strong>Peso:</strong> {{ $product->peso ? $product->peso . 'g' : 'N/A' }}
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

             <!-- Datas -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Data de Fabricação:</strong> {{ $product->data_fabricacao ? \Carbon\Carbon::parse($product->data_fabricacao)->format('d/m/Y') : 'N/A' }}
                </div>
                <div class="col-md-6">
                    <strong>Data de Validade:</strong> {{ $product->data_validade ? \Carbon\Carbon::parse($product->data_validade)->format('d/m/Y') : 'N/A' }}
                </div>
            </div>



            <!-- Outras Informações -->
            <div class="row mb-3">
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
@endsection
