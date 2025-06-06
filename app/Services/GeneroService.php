<?php

namespace App\Services;

use App\Models\Genero;
use App\Http\Resources\GeneroResource;

class GeneroService
{
    public function getAll()
    {
        return GeneroResource::collection(Genero::all());
    }

    public function findById($id)
    {
        return new GeneroResource(Genero::findOrFail($id));
    }

    public function create(array $data)
    {
        $genero = Genero::create($data);
        return new GeneroResource($genero);
    }

    public function update($id, array $data)
    {
        $genero = Genero::findOrFail($id);
        $genero->update($data);
        return new GeneroResource($genero);
    }

    public function delete($id)
    {
        $genero = Genero::findOrFail($id);
        $genero->delete();
        return ['message' => 'Gênero deletado com sucesso'];
    }
}

