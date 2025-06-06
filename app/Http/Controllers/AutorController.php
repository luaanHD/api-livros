<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Http\Requests\AutorRequest;
use App\Http\Resources\AutorResource;

class AutorController extends Controller
{
    public function listar()
    {
        return AutorResource::collection(Autor::all());
    }

    public function criar(AutorRequest $request)
    {
        $autor = Autor::create($request->validated());
        return new AutorResource($autor);
    }

    public function detalhes($id)
    {
        $autor = Autor::findOrFail($id);
        return new AutorResource($autor);
    }

    public function atualizar(AutorRequest $request, $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($request->validated());
        return new AutorResource($autor);
    }

    public function remover($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return response()->json(['mensagem' => 'Autor removido com sucesso']);
    }
}

