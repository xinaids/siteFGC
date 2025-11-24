<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('provas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data');

            $table->string('local')->nullable();
            $table->foreignId('cidade_id')->nullable()->constrained('cidades')->nullOnDelete();

            $table->foreignId('temporada_id')->constrained('temporadas')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('provas');
    }
};
