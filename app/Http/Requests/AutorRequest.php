<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'biografia' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do autor é obrigatório.',
            'nome.string' => 'O nome do autor deve ser um texto.',
            'nome.max' => 'O nome do autor não pode exceder 255 caracteres.',

            'data_nascimento.required' => 'A data de nascimento é obrigatória.',
            'data_nascimento.date' => 'A data de nascimento deve ser uma data válida.',

            'biografia.string' => 'A biografia deve ser um texto.',
        ];
    }
}
