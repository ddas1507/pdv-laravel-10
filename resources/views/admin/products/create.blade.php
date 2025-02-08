<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div>
        @if( $errors->any )
            @foreach( $errors->all() as $error )
                {{ $error }}
            @endforeach
       @endif
    </div>
    <h2 class="mb-4">Cadastrar Novo Produto</h2>
    <form action="{{ route('products.index') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Informações Básicas -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
            </div>
            <div class="col-md-6">
                <label for="categoria" class="form-label">Categoria</label>
                <select class="form-select" id="categoria" name="categoria" required>
                    <option value="">Selecione uma categoria</option>
                    <option value="Alimentos">Alimentos</option>
                    <option value="Bebidas">Bebidas</option>
                    <option value="Higiene">Higiene</option>
                    <option value="Limpeza">Limpeza</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" value="{{ old('marca') }}">
            </div>
            <div class="col-md-6">
                <label for="unidade_medida" class="form-label">Unidade de Medida</label>
                <select class="form-select" id="unidade_medida" name="unidade_medida" required>
                    <option value="">Selecione uma unidade</option>
                    <option value="kg">Quilograma (kg)</option>
                    <option value="g">Grama (g)</option>
                    <option value="L">Litro (L)</option>
                    <option value="mL">Mililitro (mL)</option>
                    <option value="unidade">Unidade</option>
                </select>
            </div>
        </div>

        <!-- Preços e Estoque -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="preco_venda" class="form-label">Preço de Venda</label>
                <input type="number" step="0.01" class="form-control" id="preco_venda" name="preco_venda" value="{{ old('preco_venda') }}" required>
            </div>
            <div class="col-md-6">
                <label for="preco_custo" class="form-label">Preço de Custo</label>
                <input type="number" step="0.01" class="form-control" id="preco_custo" name="preco_custo" value="{{ old('preco_custo') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="estoque_atual" class="form-label">Estoque Atual</label>
                <input type="number" class="form-control" id="estoque_atual" name="estoque_atual" value="{{ old('estoque_atual') }}" required>
            </div>
            <div class="col-md-4">
                <label for="estoque_minimo" class="form-label">Estoque Mínimo</label>
                <input type="number" class="form-control" id="estoque_minimo" name="estoque_minimo" value="{{ old('estoque_minimo') }}">
            </div>
            <div class="col-md-4">
                <label for="estoque_maximo" class="form-label">Estoque Máximo</label>
                <input type="number" class="form-control" id="estoque_maximo" name="estoque_maximo" value="{{ old('estoque_maximo') }}">
            </div>
        </div>

        <!-- Dimensões e Peso -->
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="peso" class="form-label">Peso (g)</label>
                <input type="number" class="form-control" id="peso" name="peso" value="{{ old('peso') }}">
            </div>
            <div class="col-md-3">
                <label for="altura" class="form-label">Altura (cm)</label>
                <input type="number" class="form-control" id="altura" name="altura" value="{{ old('altura') }}">
            </div>
            <div class="col-md-3">
                <label for="largura" class="form-label">Largura (cm)</label>
                <input type="number" class="form-control" id="largura" name="largura" value="{{ old('largura') }}">
            </div>
            <div class="col-md-3">
                <label for="comprimento" class="form-label">Comprimento (cm)</label>
                <input type="number" class="form-control" id="comprimento" name="comprimento" value="{{ old('comprimento') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="volume" class="form-label">Volume (L)</label>
                <input type="number" step="0.01" class="form-control" id="volume" name="volume" value="{{ old('volume') }}">
            </div>
        </div>

        <!-- Identificação -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="codigo_barras" class="form-label">Código de Barras</label>
                <input type="text" class="form-control" id="codigo_barras" name="codigo_barras" value="{{ old('codigo_barras') }}" required>
            </div>
            <div class="col-md-6">
                <label for="sku" class="form-label">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="ncm" class="form-label">NCM</label>
                <input type="text" class="form-control" id="ncm" name="ncm" value="{{ old('ncm') }}">
            </div>
        </div>

        <!-- Tributação -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="icms" class="form-label">ICMS (%)</label>
                <input type="number" step="0.01" class="form-control" id="icms" name="icms" value="{{ old('icms') }}">
            </div>
            <div class="col-md-4">
                <label for="ipi" class="form-label">IPI (%)</label>
                <input type="number" step="0.01" class="form-control" id="ipi" name="ipi" value="{{ old('ipi') }}">
            </div>
            <div class="col-md-4">
                <label for="pis_cofins" class="form-label">PIS/COFINS (%)</label>
                <input type="number" step="0.01" class="form-control" id="pis_cofins" name="pis_cofins" value="{{ old('pis_cofins') }}">
            </div>
        </div>

        <!-- Fornecedores -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fornecedor" class="form-label">Fornecedor</label>
                <input type="text" class="form-control" id="fornecedor" name="fornecedor" value="{{ old('fornecedor') }}">
            </div>
            <div class="col-md-6">
                <label for="tempo_reposicao" class="form-label">Tempo de Reposição (dias)</label>
                <input type="number" class="form-control" id="tempo_reposicao" name="tempo_reposicao" value="{{ old('tempo_reposicao') }}">
            </div>
        </div>

        <!-- Datas -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="data_fabricacao" class="form-label">Data de Fabricação</label>
                <input type="date" class="form-control" id="data_fabricacao" name="data_fabricacao" value="{{ old('data_fabricacao') }}">
            </div>
            <div class="col-md-4">
                <label for="data_validade" class="form-label">Data de Validade</label>
                <input type="date" class="form-control" id="data_validade" name="data_validade" value="{{ old('data_validade') }}">
            </div>
            <div class="col-md-4">
                <label for="data_entrada_estoque" class="form-label">Data de Entrada no Estoque</label>
                <input type="date" class="form-control" id="data_entrada_estoque" name="data_entrada_estoque" value="{{ old('data_entrada_estoque') }}">
            </div>
        </div>

        <!-- Promoções -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="promocao_ativa" class="form-label">Promoção Ativa?</label>
                <select class="form-select" id="promocao_ativa" name="promocao_ativa" value="{{ old('promocao_ativa') }}">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="preco_promocional" class="form-label">Preço Promocional</label>
                <input type="number" step="0.01" class="form-control" id="preco_promocional" name="preco_promocional" value="{{ old('preco_promocional') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="data_inicio_promocao" class="form-label">Data de Início da Promoção</label>
                <input type="date" class="form-control" id="data_inicio_promocao" name="data_inicio_promocao" value="{{ old('data_inicio_promocao') }}">
            </div>
            <div class="col-md-6">
                <label for="data_fim_promocao" class="form-label">Data de Fim da Promoção</label>
                <input type="date" class="form-control" id="data_fim_promocao" name="data_fim_promocao" value="{{ old('data_fim_promocao') }}">
            </div>
        </div>

        <!-- Outras Informações -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="garantia" class="form-label">Garantia (meses)</label>
                <input type="number" class="form-control" id="garantia" name="garantia" value="{{ old('garantia') }}">
            </div>
            <div class="col-md-6">
                <label for="imagem" class="form-label">Imagem</label>
                <input type="file" class="form-control" id="imagem" name="imagem" value="{{ old('imagem') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" value="{{ old('status') }}">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="observacoes" class="form-label">Observações</label>
                <textarea class="form-control" id="observacoes" name="observacoes" rows="3">{{ old('observacoes') }}</textarea>
            </div>
        </div>

        <!-- Botão de Envio -->
        <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
