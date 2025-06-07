<?php

namespace App\Services;

use App\Models\Usuario;
use App\Http\Resources\UsuarioResource;

class UsuarioService
{
    public function getAll()
    {
        return UsuarioResource::collection(Usuario::all());
    }

    public function findById($id)
    {
        return new UsuarioResource(Usuario::findOrFail($id));
    }

    public function create(array $data)
    {
        $usuario = Usuario::create($data);
        return new UsuarioResource($usuario);
    }

    public function update($id, array $data)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($data);
        return new UsuarioResource($usuario);
    }

    public function delete($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return ['message' => 'Usuário deletado com sucesso'];
    }
}
