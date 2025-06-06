<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:100|unique:generos,nome,' . $this->id,
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do gênero é obrigatório.',
            'nome.string' => 'O nome do gênero deve ser um texto.',
            'nome.max' => 'O nome do gênero não pode exceder 100 caracteres.',
            'nome.unique' => 'Este nome de gênero já está cadastrado.',
        ];
    }
}
