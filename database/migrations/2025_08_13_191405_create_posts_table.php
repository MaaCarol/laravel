<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('conteudo'); // texto da postagem
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // relação com usuário
            $table->string('picture', 255)->nullable(); // opcional: imagem do post
            $table->string('description', 255)->nullable(); // opcional: descrição extra
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
