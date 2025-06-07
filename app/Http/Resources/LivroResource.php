<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LivroResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'sinopse' => $this->sinopse,
            'genero' => $this->genero->nome ?? null,
            'autor' => $this->autor->nome ?? null,
            'created_at' => $this->created_at,
        ];
    }
}

