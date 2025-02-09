<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'nome' => 'Arroz Branco',
                'descricao' => 'Arroz branco tipo 1, embalagem de 1kg.',
                'categoria' => 'Alimentos',
                'marca' => 'Tio João',
                'unidade_medida' => 'kg',
                'preco_venda' => 15.99,
                'estoque_atual' => 100,
                'peso' => 1000, // em gramas
                'codigo_barras' => '7891234567890',
                'sku' => 'ARROZ-TJ-1KG',
                'data_fabricacao' => '2023-01-01',
                'data_validade' => '2025-01-01',
                'status' => 'ativo',
                'observacoes' => 'Produto sensível à umidade. Armazenar em local seco.',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
