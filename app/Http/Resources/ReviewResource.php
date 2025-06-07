<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'livro_id' => $this->livro_id,
            'usuario_id' => $this->usuario_id,
            'comentario' => $this->comentario,
            'nota' => $this->nota,
            'livro' => new LivroResource($this->whenLoaded('livro')),
            'usuario' => new UsuarioResource($this->whenLoaded('usuario')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
