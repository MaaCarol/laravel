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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'tipo')) {
                $table->string('tipo')->default('admin');
            }
            if (!Schema::hasColumn('users', 'picture')) {
                $table->string('picture')->nullable();
            }
            if (!Schema::hasColumn('users', 'status')) {
                $table->string('status')->default('active');
            }
            if (!Schema::hasColumn('users', 'enabled')) {
                $table->boolean('enabled')->default(true);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'tipo')) {
                $table->dropColumn('tipo');
            }
            if (Schema::hasColumn('users', 'picture')) {
                $table->dropColumn('picture');
            }
            if (Schema::hasColumn('users', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('users', 'enabled')) {
                $table->dropColumn('enabled');
            }
        });
    }
};
