<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'nome' => 'required|string|max:255|min:3',
            'descricao' => 'nullable|string',
            'categoria' => 'required|string|max:255',
            'marca' => 'nullable|string|max:255',
            'unidade_medida' => 'required|string|max:50',
            'preco_venda' => 'required|numeric|min:0',
            'preco_custo' => 'nullable|numeric|min:0',
            'estoque_atual' => 'required|integer|min:0',
            'estoque_minimo' => 'nullable|integer|min:0',
            'estoque_maximo' => 'nullable|integer|min:0',
            'peso' => 'nullable|integer|min:0',
            'altura' => 'nullable|integer|min:0',
            'largura' => 'nullable|integer|min:0',
            'comprimento' => 'nullable|integer|min:0',
            'volume' => 'nullable|numeric|min:0',
            'codigo_barras' => 'required|string|unique:products,codigo_barras',
            'sku' => 'required|string|unique:products,sku',
            'ncm' => 'nullable|string|max:20',
            'icms' => 'nullable|numeric|min:0|max:100',
            'ipi' => 'nullable|numeric|min:0|max:100',
            'pis_cofins' => 'nullable|numeric|min:0|max:100',
            'fornecedor' => 'nullable|string|max:255',
            'tempo_reposicao' => 'nullable|integer|min:0',
            'data_fabricacao' => 'nullable|date',
            'data_validade' => 'nullable|date|after_or_equal:data_fabricacao',
            'data_entrada_estoque' => 'nullable|date',
            'promocao_ativa' => 'nullable|boolean',
            'preco_promocional' => 'nullable|numeric|min:0',
            'data_inicio_promocao' => 'nullable|date',
            'data_fim_promocao' => 'nullable|date|after_or_equal:data_inicio_promocao',
            'garantia' => 'nullable|integer|min:0',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Máximo de 2MB
            'status' => 'required|string|in:ativo,inativo',
            'observacoes' => 'nullable|string',
        ];

        if ($this->method() == 'PUT') {
            $rules['nome'] = [
                'required',
                'string',
                'min:3',
                'max:255',
                //"unique:products,nome,{$this->id},id",
                Rule::unique('products')->ignore($this->id),
            ];
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome é obrigatório.',
            'nome.max' => 'O campo Nome não pode ter mais de 255 caracteres.',
            'categoria.required' => 'O campo Categoria é obrigatório.',
            'unidade_medida.required' => 'O campo Unidade de Medida é obrigatório.',
            'preco_venda.required' => 'O campo Preço de Venda é obrigatório.',
            'preco_venda.numeric' => 'O campo Preço de Venda deve ser um número.',
            'preco_venda.min' => 'O campo Preço de Venda deve ser maior ou igual a 0.',
            'codigo_barras.required' => 'O campo Código de Barras é obrigatório.',
            'codigo_barras.unique' => 'Este Código de Barras já está em uso.',
            'sku.required' => 'O campo SKU é obrigatório.',
            'sku.unique' => 'Este SKU já está em uso.',
            'data_validade.after_or_equal' => 'A Data de Validade deve ser posterior ou igual à Data de Fabricação.',
            'data_fim_promocao.after_or_equal' => 'A Data de Fim da Promoção deve ser posterior ou igual à Data de Início da Promoção.',
            'imagem.image' => 'O arquivo enviado deve ser uma imagem válida.',
            'imagem.mimes' => 'A imagem deve estar em um dos formatos: jpeg, png, jpg, gif.',
            'imagem.max' => 'A imagem não pode ser maior que 2MB.',
        ];
    }
}
