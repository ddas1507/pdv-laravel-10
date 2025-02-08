<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'descricao',
        'categoria',
        'marca',
        'unidade_medida',
        'preco_venda',
        'preco_custo',
        'estoque_atual',
        'estoque_minimo',
        'estoque_maximo',
        'peso',
        'altura',
        'largura',
        'comprimento',
        'volume',
        'codigo_barras',
        'sku',
        'ncm',
        'icms',
        'ipi',
        'pis_cofins',
        'fornecedor',
        'tempo_reposicao',
        'data_fabricacao',
        'data_validade',
        'data_entrada_estoque',
        'promocao_ativa',
        'preco_promocional',
        'data_inicio_promocao',
        'data_fim_promocao',
        'garantia',
        'imagem',
        'status',
        'observacoes',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'preco_venda' => 'float',
        'preco_custo' => 'float',
        'estoque_atual' => 'integer',
        'estoque_minimo' => 'integer',
        'estoque_maximo' => 'integer',
        'peso' => 'integer',
        'altura' => 'integer',
        'largura' => 'integer',
        'comprimento' => 'integer',
        'volume' => 'float',
        'icms' => 'float',
        'ipi' => 'float',
        'pis_cofins' => 'float',
        'tempo_reposicao' => 'integer',
        'promocao_ativa' => 'boolean',
        'garantia' => 'integer',
        'data_fabricacao' => 'date',
        'data_validade' => 'date',
        'data_entrada_estoque' => 'date',
        'data_inicio_promocao' => 'date',
        'data_fim_promocao' => 'date',
    ];
}
