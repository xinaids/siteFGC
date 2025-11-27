<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('provas', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->integer('etapa');

            $table->foreignId('temporada_id')
                ->constrained('temporadas')
                ->onDelete('cascade');

            $table->enum('tipo', ['XCM', 'XCO']);

            $table->integer('peso'); // 3, 4, 5

            $table->foreignId('cidade_id')
                ->nullable()
                ->constrained('cidades')
                ->onDelete('set null');

            $table->date('data_prova');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provas');
    }
};
