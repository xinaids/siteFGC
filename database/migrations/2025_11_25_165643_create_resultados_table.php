<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();

            $table->foreignId('prova_id')->constrained('provas')->cascadeOnDelete();
            $table->foreignId('atleta_id')->constrained('atletas')->cascadeOnDelete();
            $table->foreignId('categoria_id')->nullable()->constrained('categorias')->nullOnDelete();

            $table->integer('classificacao')->nullable(); // 1º, 2º, 3º...
            $table->string('tempo')->nullable(); // formato livre (HH:MM:SS)
            $table->integer('pontuacao')->default(0);

            $table->string('status')->default('OK'); 
            // valores possíveis: OK, DNF, DSQ, DNS etc

            $table->timestamps();

            // atleta não pode ter dois resultados na mesma prova
            $table->unique(['prova_id', 'atleta_id']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('resultados');
    }
};
