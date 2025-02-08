<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Produtos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Listagem de Produtos</h2>

    <!-- Botão Adicionar Produto -->
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Adicionar Produto</a>

    <!-- Tabela de Produtos -->
    <table id="produtos-table" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Nome</th>
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
                <td>{{ $product->categoria }}</td>
                <td>R$ {{ number_format($product->preco_venda, 2, ',', '.') }}</td>
                <td>{{ $product->estoque_atual }}</td>
                <td>{{ ucfirst($product->status) }}</td>
                <td>
                    <a href="{{ route('products.show',[$product->id]) }}">abrir</a> |
                    <a href="{{ route('products.edit',[$product->id]) }}">editar</a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#produtos-table').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json' // Tradução para português
            }
        });
    });
</script>
</body>
</html>
