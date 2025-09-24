<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::orderBy('created_at', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $dados = $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $dados['picture'] = $request['picture'];

        $post = Post::create($dados);

        return response()->json([
            'message'=>'Postagem Realizada',
            'post'=> $post
        ],201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'content' => 'required|string',
            'picture' => 'nullable|string|max:255',
        ]);

        $post = Post::create([
            'user_name' => $request->user_name ?? 'Anônimo',
            'description' => $request->description,
            'content' => $request->content,
            'picture' => $request->picture,
        ]);

        return response()->json($post, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
