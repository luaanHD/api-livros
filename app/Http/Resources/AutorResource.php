<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutorResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'data_nascimento' => $this->data_nascimento,
            'biografia' => $this->biografia,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

