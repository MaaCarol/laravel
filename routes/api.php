<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
});

Route::get('/clientes', function () {
    return [
        ['nome' => 'Maria', 'email' => 'maria@email.com'],
        ['nome' => 'João', 'email' => 'joao@email.com'],
        ['nome' => 'Ana', 'email' => 'ana@email.com'],
        ['nome' => 'Pedro', 'email' => 'pedro@email.com'],
        ['nome' => 'Carla', 'email' => 'carla@email.com'],
        ['nome' => 'Lucas', 'email' => 'lucas@email.com'],
        ['nome' => 'Fernanda', 'email' => 'fernanda@email.com'],
        ['nome' => 'Ricardo', 'email' => 'ricardo@email.com'],
        ['nome' => 'Beatriz', 'email' => 'beatriz@email.com'],
        ['nome' => 'Paulo', 'email' => 'paulo@email.com'],
        ['nome' => 'Juliana', 'email' => 'juliana@email.com']
    ];
});