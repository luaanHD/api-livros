<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'sinopse' => 'nullable|string',
            'genero_id' => 'nullable|exists:generos,id',
            'autor_id' => 'required|exists:autores,id',
        ];
    }
        public function messages(): array
    {
        return [
            'titulo.required' => 'O título é obrigatório.',
            'titulo.string' => 'O título deve ser um texto.',
            'titulo.max' => 'O título não pode ter mais de 255 caracteres.',

            'sinopse.string' => 'A sinopse deve ser um texto.',

            'genero_id.exists' => 'O gênero informado não existe.',

            'autor_id.required' => 'O autor é obrigatório.',
            'autor_id.exists' => 'O autor informado não existe.',
        ];
    }
}

