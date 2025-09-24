<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aqui você registra as rotas da sua API. Elas já estão automaticamente
| prefixadas com /api, então /register na verdade responde em
| http://127.0.0.1:8000/api/register
|
*/

// 🔹 Cadastro de usuário
Route::post('/register', [UsuarioController::class, 'registrar']);

// 🔹 Login
Route::post('/login', [UsuarioController::class, 'login']);

// 🔹 Rotas protegidas (token obrigatório)
Route::middleware('auth:sanctum')->prefix('usuario')->group(function () {
    Route::post('/logout', [UsuarioController::class, 'logout']);
    Route::post('/editar', [UsuarioController::class, 'editar']);
    Route::post('/perfil', [UsuarioController::class, 'perfil']);
    Route::post('/desativar-conta', [UsuarioController::class, 'desativarConta']);
    Route::post('/foto-upload', [UsuarioController::class, 'fotoUpload']);
});
