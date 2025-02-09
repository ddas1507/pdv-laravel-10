@extends('layouts.app')
@section('title','listagem')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Listagem de Produtos</h2>

        <!-- Botão Adicionar Produto -->
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Adicionar Produto</a>

        <!-- Tabela de Produtos -->
        <table id="produtos-table" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th>Preço de Venda</th>
                <th>Estoque Atual</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->nome }}</td>
                    <td>{{ $product->marca }}</td>
                    <td>{{ $product->categoria }}</td>
                    <td>R$ {{ number_format($product->preco_venda, 2, ',', '.') }}</td>
                    <td>{{ $product->estoque_atual }}</td>
                    <td>{{ ucfirst($product->status) }}</td>
                    <td>
                        <a href="{{ route('products.show',[$product->id]) }}">detalhes</a> |
                        <a href="{{ route('products.edit',[$product->id]) }}">atualizar</a>
                        <form action="{{ route('products.destroy',$product->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">deletar</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
