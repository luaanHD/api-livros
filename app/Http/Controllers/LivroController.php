<?php
namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Http\Resources\LivroResource;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function listar()
    {
        return LivroResource::collection(Livro::all());
    }

    public function criar(LivroRequest $request)
    {
        $livro = Livro::create($request->validated());
        return new LivroResource($livro);
    }

    public function detalhes($id)
    {
        $livro = Livro::findOrFail($id);
        return new LivroResource($livro);
    }

    public function atualizar(LivroRequest $request, $id)
    {
        $livro = Livro::findOrFail($id);
        $livro->update($request->validated());
        return new LivroResource($livro);
    }

    public function remover($id)
    {
        Livro::destroy($id);
        return response()->json(['mensagem' => 'Livro removido com sucesso.']);
    }
    
    public function listarReviews($id)
    {
        $livro = Livro::with('reviews')->findOrFail($id);
        return response()->json($livro->reviews);
    }

    public function listarComRelacionamentos()
    {
        $livros = Livro::with(['reviews', 'autor', 'genero'])->get();
        return response()->json($livros);
    }

}


