<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proprietario', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('ano_nascimento');
            $table->string('profissao')->nullable();
            $table->string('telefone', 15)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proprietario');
    }
};
