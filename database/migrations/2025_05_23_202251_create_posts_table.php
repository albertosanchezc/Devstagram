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
            $table->string('titulo');//Esto crea un varchar
            $table->text('descripcion');//Esto crea un tipo de dato mayor al varchar
            $table->string('imagen');//Esto crea un varchar
            $table->foreignId('user_id')->constrained()->onDelete('cascade');// Si un usuario elimina su cuenta también se eliminarán sus posts
            $table->timestamps();
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
