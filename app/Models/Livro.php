<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'sinopse',
        'genero_id',
        'autor_id',
    ];

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
