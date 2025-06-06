<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Http\Requests\GeneroRequest;
use App\Http\Resources\GeneroResource;

class GeneroController extends Controller
{
    public function listar()
    {
        return GeneroResource::collection(Genero::all());
    }

    public function criar(GeneroRequest $request)
    {
        $genero = Genero::create($request->validated());
        return new GeneroResource($genero);
    }

    public function detalhes($id)
    {
        $genero = Genero::findOrFail($id);
        return new GeneroResource($genero);
    }

    public function atualizar(GeneroRequest $request, $id)
    {
        $genero = Genero::findOrFail($id);
        $genero->update($request->validated());
        return new GeneroResource($genero);
    }

    public function remover($id)
    {
        $genero = Genero::findOrFail($id);
        $genero->delete();
        return response()->json(['mensagem' => 'Gênero removido com sucesso']);
    }
}
