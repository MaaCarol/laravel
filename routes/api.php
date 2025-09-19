<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    Route::post('editar', [UsuarioController::class, 'editar']);
    Route::post('perfil', [UsuarioController::class, 'perfil']);
});

// 🔹 Se você quiser apenas a rota "registrar":
Route::post('registrar-se', [UsuarioController::class, 'registrar']);

// 🔹 Se você quiser CRUD RESTful completo, troque a linha acima por:
// Route::apiResource('registrar-se', UsuarioController::class);

Route::prefix('usuario')->group(function () {
    Route::post('login', [UsuarioController::class, 'login']);
    Route::post('logout', [UsuarioController::class, 'logout']);
    Route::post('desativar-conta', [UsuarioController::class, 'desativarConta']);
    Route::post('foto-upload', [UsuarioController::class, 'fotoUpload']);
});