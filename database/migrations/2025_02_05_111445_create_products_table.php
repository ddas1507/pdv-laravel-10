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
            $table->integer('estoque_atual'); // Estoque atual

            // Dimensões e peso
            $table->integer('peso')->nullable(); // Peso em gramas

            // Identificação
            $table->string('codigo_barras')->unique(); // Código de barras
            $table->string('sku')->unique(); // Stock Keeping Unit (SKU)

            // Datas
            $table->date('data_fabricacao')->nullable(); // Data de fabricação
            $table->date('data_validade')->nullable(); // Data de validade

            // Outras informações
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
