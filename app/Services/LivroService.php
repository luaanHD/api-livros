<?php

namespace App\Services;

use App\Models\Livro;
use App\Http\Resources\LivroResource;

class LivroService
{
    public function getAll()
    {
        return LivroResource::collection(Livro::with(['autor', 'genero'])->get());
    }

    public function findById($id)
    {
        return new LivroResource(Livro::with(['autor', 'genero'])->findOrFail($id));
    }

    public function create(array $data)
    {
        $livro = Livro::create($data);
        return new LivroResource($livro->load(['autor', 'genero']));
    }

    public function update($id, array $data)
    {
        $livro = Livro::findOrFail($id);
        $livro->update($data);
        return new LivroResource($livro->load(['autor', 'genero']));
    }

    public function delete($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();
        return ['message' => 'Livro deletado com sucesso'];
    }
}
