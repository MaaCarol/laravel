<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // 🔹 Cadastro
    public function registrar(Request $request)
    {
        $dados = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $dados['password'] = Hash::make($dados['password']);
        $dados['picture'] = $request->picture ?? 'https://cdn0.iconfinder.com/data/icons/seo-web-4-1/128/Vigor_User-Avatar-Profile-Photo-02-1024.png';
        $dados['status'] = $request->status ?? 'active';
        $dados['enabled'] = $request->enabled ?? 'true';
        $dados['tipo'] = $request->tipo ?? 'admin';

        $usuario = User::create($dados);
        $token = $usuario->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Usuário registrado com sucesso.',
            'user' => $usuario,
            'token' => $token
        ], 201);
    }

    // 🔹 Login
    public function login(Request $request)
    {
        $credenciais = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = User::where('email', $credenciais['email'])->first();

        if (!$usuario || !Hash::check($credenciais['password'], $usuario->password)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $token = $usuario->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login realizado com sucesso.',
            'user' => $usuario,
            'token' => $token
        ]);
    }

    // 🔹 Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout realizado com sucesso.']);
    }

    // 🔹 Upload de foto
    public function fotoUpload(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $usuario = $request->user();
        $path = $request->file('picture')->store('pictures', 'public');

        $usuario->update(['picture' => $path]);

        return response()->json([
            'message' => 'Foto enviada com sucesso.',
            'picture_url' => asset('storage/' . $path)
        ]);
    }

    // 🔹 Desativar conta
    public function desativarConta(Request $request)
    {
        $usuario = $request->user();
        $usuario->update(['enabled' => false, 'status' => 'inactive']);

        return response()->json(['message' => 'Conta desativada com sucesso.']);
    }

    // 🔹 Perfil do usuário
    public function perfil(Request $request)
    {
        return response()->json($request->user());
    }

    // 🔹 Editar dados
    public function editar(Request $request)
    {
        $usuario = $request->user();

        $dados = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $usuario->id,
            'password' => 'nullable|string|min:6|confirmed',
            'picture' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:15',
            'enabled' => 'nullable|string|max:15',
            'tipo' => 'nullable|string|max:255'
        ]);

        if (!empty($dados['password'])) {
            $dados['password'] = Hash::make($dados['password']);
        } else {
            unset($dados['password']);
        }

        $usuario->update($dados);

        return response()->json([
            'message' => 'Dados atualizados com sucesso.',
            'user' => $usuario
        ]);
    }
}
