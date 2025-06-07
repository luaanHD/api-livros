<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nota' => 'required|integer|min:0|max:10',
            'comentario' => 'nullable|string',
            'usuario_id' => 'required|exists:usuarios,id',
            'livro_id' => 'required|exists:livros,id',
            'nota' => ['required', 'integer', 'between:0,5'],
        ];
        
    }

     public function messages(): array
    {
        return [
            'nota.required' => 'A nota é obrigatória.',
            'nota.integer' => 'A nota deve ser um número inteiro.',
            'nota.min' => 'A nota deve ser no mínimo 0.',
            'nota.max' => 'A nota deve ser no máximo 5.',
        ];
    }
    
}

