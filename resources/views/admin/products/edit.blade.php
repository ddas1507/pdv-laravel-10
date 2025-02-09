@extends('layouts.app')
@section('title','atualizar: '.$product->nome)
@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Editar produto</h2>

    <!-- Botão Voltar -->
    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Voltar</a>

    <div>
        @if( $errors->any )
            @foreach( $errors->all() as $error )
                <ul>
                    <li>{{ $error }}</li>
                </ul>
            @endforeach
        @endif
    </div>
    <!-- Formulário de Edição -->
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Informações Básicas -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome do produto</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $product->nome) }}" required>
            </div>
            <div class="col-md-6">
                <label for="categoria" class="form-label">Categoria</label>
                <select class="form-select" id="categoria" name="categoria" required>
                    <option value="">Selecione uma categoria</option>
                    <option value="Alimentos" {{ old('categoria', $product->categoria) == 'Alimentos' ? 'selected' : '' }}>Alimentos</option>
                    <option value="Bebidas" {{ old('categoria', $product->categoria) == 'Bebidas' ? 'selected' : '' }}>Bebidas</option>
                    <option value="Higiene" {{ old('categoria', $product->categoria) == 'Higiene' ? 'selected' : '' }}>Higiene</option>
                    <option value="Limpeza" {{ old('categoria', $product->categoria) == 'Limpeza' ? 'selected' : '' }}>Limpeza</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" value="{{ old('marca', $product->marca) }}">
            </div>
            <div class="col-md-6">
                <label for="unidade_medida" class="form-label">Unidade de Medida</label>
                <select class="form-select" id="unidade_medida" name="unidade_medida" required>
                    <option value="">Selecione uma unidade</option>
                    <option value="kg" {{ old('unidade_medida', $product->unidade_medida) == 'kg' ? 'selected' : '' }}>Quilograma (kg)</option>
                    <option value="g" {{ old('unidade_medida', $product->unidade_medida) == 'g' ? 'selected' : '' }}>Grama (g)</option>
                    <option value="L" {{ old('unidade_medida', $product->unidade_medida) == 'L' ? 'selected' : '' }}>Litro (L)</option>
                    <option value="mL" {{ old('unidade_medida', $product->unidade_medida) == 'mL' ? 'selected' : '' }}>Mililitro (mL)</option>
                    <option value="unidade" {{ old('unidade_medida', $product->unidade_medida) == 'unidade' ? 'selected' : '' }}>Unidade</option>
                </select>
            </div>
        </div>

        <!-- Preços e Estoque -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="preco_venda" class="form-label">Preço de Venda</label>
                <input type="number" step="0.01" class="form-control" id="preco_venda" name="preco_venda" value="{{ old('preco_venda', $product->preco_venda) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="estoque_atual" class="form-label">Estoque Atual</label>
                <input type="number" class="form-control" id="estoque_atual" name="estoque_atual" value="{{ old('estoque_atual', $product->estoque_atual) }}" required>
            </div>
        </div>

        <!-- Dimensões e Peso -->
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="peso" class="form-label">Peso (g)</label>
                <input type="number" class="form-control" id="peso" name="peso" value="{{ old('peso', $product->peso) }}">
            </div>
        </div>

        <!-- Identificação -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="codigo_barras" class="form-label">Código de Barras</label>
                <input type="text" class="form-control" id="codigo_barras" name="codigo_barras" value="{{ old('codigo_barras', $product->codigo_barras) }}" required>
            </div>
            <div class="col-md-6">
                <label for="sku" class="form-label">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku', $product->sku) }}" required>
            </div>
        </div>

        <!-- Datas -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="data_fabricacao" class="form-label">Data de Fabricação</label>
                <input type="date" class="form-control" id="data_fabricacao" name="data_fabricacao" value="{{ old('data_fabricacao', $product->data_fabricacao) }}">
            </div>
            <div class="col-md-4">
                <label for="data_validade" class="form-label">Data de Validade</label>
                <input type="date" class="form-control" id="data_validade" name="data_validade" value="{{ old('data_validade', $product->data_validade) }}">
            </div>
        </div>

        <!-- Outras Informações -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="imagem" class="form-label">Imagem</label>
                <input type="file" class="form-control" id="imagem" name="imagem">
                @if ($product->imagem)
                    <img src="{{ asset($product->imagem) }}" alt="{{ $product->nome }}" class="img-fluid mt-2" style="max-width: 200px;">
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="ativo" {{ old('status', $product->status) == 'ativo' ? 'selected' : '' }}>Ativo</option>
                    <option value="inativo" {{ old('status', $product->status) == 'inativo' ? 'selected' : '' }}>Inativo</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="observacoes" class="form-label">Observações</label>
                <textarea class="form-control" id="observacoes" name="observacoes" rows="3">{{ old('observacoes', $product->observacoes) }}</textarea>
            </div>
        </div>

        <!-- Botão de Envio -->
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
@endsection
