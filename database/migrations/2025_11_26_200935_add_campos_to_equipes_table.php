<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('equipes', function (Blueprint $table) {
            $table->string('cidade')->nullable();
            $table->string('responsavel')->nullable();
            $table->string('telefone', 50)->nullable();
            $table->string('email')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('equipes', function (Blueprint $table) {
            $table->dropColumn(['cidade', 'responsavel', 'telefone', 'email']);
        });
    }
};
