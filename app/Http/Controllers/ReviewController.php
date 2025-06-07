<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;

class ReviewController extends Controller
{
    public function listar()
    {
        return ReviewResource::collection(Review::all());
    }

    public function criar(ReviewRequest $request)
    {
        $review = Review::create($request->validated());
        return new ReviewResource($review);
    }

    public function detalhes($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['mensagem' => 'Review não encontrada.'], 404);
        }
        return new ReviewResource($review);
    }

    public function atualizar(ReviewRequest $request, $id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['mensagem' => 'Review não encontrada.'], 404);
        }

        $review->update($request->validated());
        return new ReviewResource($review);
    }

    public function remover($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['mensagem' => 'Review não encontrada.'], 404);
        }

        $review->delete();
        return response()->json(['mensagem' => 'Review removida com sucesso.']);
    }
}
