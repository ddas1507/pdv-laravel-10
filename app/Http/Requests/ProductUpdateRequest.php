<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
            'peso' => 'nullable|integer|min:0',
            'codigo_barras' => 'required|string|unique:products,codigo_barras',
            'sku' => 'required|string|unique:products,sku',
            'data_fabricacao' => 'nullable|date',
            'data_validade' => 'nullable|date|after_or_equal:data_fabricacao',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Máximo de 2MB
            'status' => 'required|string|in:ativo,inativo',
            'observacoes' => 'nullable|string',
        ];

        if ($this->method() == 'PUT') {

            $rules['nome'] = [
                'nullable',
                'string',
                'min:3',
                'max:255',
                //"unique:products,nome,{$this->id},id",
                //Rule::unique('products')->ignore($this->id),
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
            'sku.required' => 'O campo SKU é obrigatório.',
            'data_validade.after_or_equal' => 'A Data de Validade deve ser posterior ou igual à Data de Fabricação.',
            'imagem.image' => 'O arquivo enviado deve ser uma imagem válida.',
            'imagem.mimes' => 'A imagem deve estar em um dos formatos: jpeg, png, jpg, gif.',
            'imagem.max' => 'A imagem não pode ser maior que 2MB.',
        ];
    }
}
