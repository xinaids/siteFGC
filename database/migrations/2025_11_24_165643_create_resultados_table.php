<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();

            $table->foreignId('atleta_id')->constrained('atletas')->cascadeOnDelete();
            $table->foreignId('prova_id')->constrained('provas')->cascadeOnDelete();

            $table->integer('posicao')->nullable();
            $table->string('tempo')->nullable();
            $table->integer('pontos')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('resultados');
    }
};
