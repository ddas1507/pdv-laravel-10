<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            // Chave primária
            $table->id();

            // Informações básicas
            $table->string('nome');
            $table->text('descricao')->nullable(); // Descrição detalhada
            $table->string('categoria'); // Categoria do produto
            $table->string('marca')->nullable(); // Marca/fabricante
            $table->string('unidade_medida'); // Unidade de medida (ex.: kg, g, L)

            // Preços e estoque
            $table->decimal('preco_venda', 8, 2); // Preço de venda
            $table->decimal('preco_custo', 8, 2)->nullable(); // Preço de custo
            $table->integer('estoque_atual'); // Estoque atual
            $table->integer('estoque_minimo')->nullable(); // Estoque mínimo
            $table->integer('estoque_maximo')->nullable(); // Estoque máximo

            // Dimensões e peso
            $table->integer('peso')->nullable(); // Peso em gramas
            $table->integer('altura')->nullable(); // Altura em cm
            $table->integer('largura')->nullable(); // Largura em cm
            $table->integer('comprimento')->nullable(); // Comprimento em cm
            $table->decimal('volume', 6, 2)->nullable(); // Volume em litros

            // Identificação
            $table->string('codigo_barras')->unique(); // Código de barras
            $table->string('sku')->unique(); // Stock Keeping Unit (SKU)
            $table->string('ncm')->nullable(); // Nomenclatura Comum do Mercosul (NCM)

            // Tributação
            $table->decimal('icms', 5, 2)->nullable(); // ICMS
            $table->decimal('ipi', 5, 2)->nullable(); // IPI
            $table->decimal('pis_cofins', 5, 2)->nullable(); // PIS/COFINS

            // Fornecedores
            $table->string('fornecedor')->nullable(); // Nome do fornecedor
            $table->integer('tempo_reposicao')->nullable(); // Tempo de reposição em dias

            // Datas
            $table->date('data_fabricacao')->nullable(); // Data de fabricação
            $table->date('data_validade')->nullable(); // Data de validade
            $table->date('data_entrada_estoque')->nullable(); // Data de entrada no estoque

            // Promoções
            $table->boolean('promocao_ativa')->default(false); // Promoção ativa?
            $table->decimal('preco_promocional', 8, 2)->nullable(); // Preço promocional
            $table->date('data_inicio_promocao')->nullable(); // Data de início da promoção
            $table->date('data_fim_promocao')->nullable(); // Data de fim da promoção

            // Outras informações
            $table->integer('garantia')->nullable(); // Garantia em meses
            $table->string('imagem')->nullable(); // URL ou caminho da imagem
            $table->string('status')->default('ativo'); // Status do produto (ativo/inativo)
            $table->text('observacoes')->nullable(); // Observações adicionais

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
