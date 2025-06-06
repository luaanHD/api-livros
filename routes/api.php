<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\AutorController;


Route::controller(LivroController::class)->group(function () {
    Route::get('/livros/listar', 'listar');
    Route::post('/livros/criar', 'criar');
    Route::get('/livros/detalhes/{id}', 'detalhes');
    Route::put('/livros/atualizar/{id}', 'atualizar');
    Route::delete('/livros/remover/{id}', 'remover');
});

Route::controller(AutorController::class)->group(function () {
    Route::get('/autores/listar', 'listar');
    Route::post('/autores/criar', 'criar');
    Route::get('/autores/detalhes/{id}', 'detalhes');
    Route::put('/autores/atualizar/{id}', 'atualizar');
    Route::delete('/autores/remover/{id}', 'remover');
});

Route::controller(GeneroController::class)->group(function () {
    Route::get('/generos/listar', 'listar');
    Route::post('/generos/criar', 'criar');
    Route::get('/generos/detalhes/{id}', 'detalhes');
    Route::put('/generos/atualizar/{id}', 'atualizar');
    Route::delete('/generos/remover/{id}', 'remover');
});

Route::controller(ReviewController::class)->group(function () {
    Route::get('/reviews/listar', 'listar');
    Route::post('/reviews/criar', 'criar');
    Route::get('/reviews/detalhes/{id}', 'detalhes');
    Route::put('/reviews/atualizar/{id}', 'atualizar');
    Route::delete('/reviews/remover/{id}', 'remover');
});

Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuarios/listar', 'listar');
    Route::post('/usuarios/criar', 'criar');
    Route::get('/usuarios/detalhes/{id}', 'detalhes');
    Route::put('/usuarios/atualizar/{id}', 'atualizar');
    Route::delete('/usuarios/remover/{id}', 'remover');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
