<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->integer('min_idade')->nullable();
            $table->integer('max_idade')->nullable();
            $table->enum('sexo', ['M','F','A'])->default('A');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('categorias');
    }
};
