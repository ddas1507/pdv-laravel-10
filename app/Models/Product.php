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
        'estoque_atual',
        'peso',
        'codigo_barras',
        'sku',
        'data_fabricacao',
        'data_validade',
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
        'estoque_atual' => 'integer',
        'peso' => 'integer',
        'data_fabricacao' => 'date',
        'data_validade' => 'date',
    ];
}
