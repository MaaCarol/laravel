<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Listar todas as postagens
     */
    public function index()
    {
        // Pega todos os posts do mais recente para o mais antigo
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();

        return response()->json($posts);
    }

    /**
     * Criar uma nova postagem
     */
    public function store(Request $request)
    {
        // Validação do texto
        $request->validate([
            'conteudo' => 'required|string|max:500',
        ]);

        // Cria o post associado ao usuário logado
        $post = Post::create([
            'conteudo' => $request->conteudo,
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'message' => 'Post criado com sucesso!',
            'post' => $post
        ], 201);
    }
}
