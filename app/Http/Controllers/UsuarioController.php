<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\UsuarioRequest;
use App\Http\Resources\UsuarioResource;
use App\Services\UsuarioService;
use Illuminate\Http\JsonResponse;

class UsuarioController extends Controller
{
    public function listar()
    {
        return UsuarioResource::collection(Usuario::all());
    }

    public function criar(UsuarioRequest $request)
    {
        $usuario = Usuario::create($request->validated());
        return new UsuarioResource($usuario);
    }

    public function detalhes($id)
    {
        $usuario = Usuario::findOrFail($id);
        return new UsuarioResource($usuario);
    }

    public function atualizar(UsuarioRequest $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->validated());
        return new UsuarioResource($usuario);
    }

    public function remover($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return response()->json(['mensagem' => 'Usuário removido com sucesso']);
    }
}

