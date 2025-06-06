<?php

namespace App\Services;

use App\Models\Review;
use App\Http\Resources\ReviewResource;

class ReviewService
{
    public function getAll()
    {
        return ReviewResource::collection(Review::with(['livro', 'usuario'])->get());
    }

    public function findById($id)
    {
        return new ReviewResource(Review::with(['livro', 'usuario'])->findOrFail($id));
    }

    public function create(array $data)
    {
        $review = Review::create($data);
        return new ReviewResource($review->load(['livro', 'usuario']));
    }

    public function update($id, array $data)
    {
        $review = Review::findOrFail($id);
        $review->update($data);
        return new ReviewResource($review->load(['livro', 'usuario']));
    }

    public function delete($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return ['message' => 'Review deletado com sucesso'];
    }
}
