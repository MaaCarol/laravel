<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PostController;

// 🔹 Cadastro de usuário
Route::post('/register', [UsuarioController::class, 'registrar']);

// 🔹 Login
Route::post('/login', [UsuarioController::class, 'login']);

// 🔹 Rotas protegidas (token obrigatório)
Route::middleware('auth:sanctum')->group(function () {

    // Usuário
    Route::prefix('usuario')->group(function () {
        Route::post('/logout', [UsuarioController::class, 'logout']);
        Route::post('/editar', [UsuarioController::class, 'editar']);
        Route::post('/perfil', [UsuarioController::class, 'perfil']);
        Route::post('/desativar-conta', [UsuarioController::class, 'desativarConta']);
    });

    // Posts
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index']); // Listar postagens
        Route::post('/', [PostController::class, 'store']); // Criar postagem
    });
});
