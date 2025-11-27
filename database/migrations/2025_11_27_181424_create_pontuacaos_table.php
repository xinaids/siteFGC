<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pontuacoes', function (Blueprint $table) {
            $table->id();
            $table->string('classificacao'); // 1,2... DNF, DSQ, demais
            $table->integer('base')->default(0);
            $table->integer('peso3')->default(0);
            $table->integer('peso4')->default(0);
            $table->integer('peso5')->default(0);
            $table->string('tipo')->default('normal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pontuacoes');
    }
};
