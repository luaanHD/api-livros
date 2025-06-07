<?php
namespace App\Services;
use App\Models\Autor;
use App\Http\Resources\AutorResource;

class AutorService
{
    public function getAll()
    {
        return AutorResource::collection(Autor::all());
    }

    public function findById($id)
    {
        return new AutorResource(Autor::findOrFail($id));
    }

    public function create(array $data)
    {
        $autor = Autor::create($data);
        return new AutorResource($autor);
    }

    public function update($id, array $data)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($data);
        return new AutorResource($autor);
    }

    public function delete($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return ['message' => 'Autor deletado com sucesso'];
    }
}

