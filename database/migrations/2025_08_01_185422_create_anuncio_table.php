<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anuncio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('veiculo_id');
            $table->string('titulo');
            $table->text('descricao');
            $table->decimal('preco', 10, 2);
            $table->foreign('veiculo_id')->references('id')->on('veiculo')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anuncio');
    }
};
