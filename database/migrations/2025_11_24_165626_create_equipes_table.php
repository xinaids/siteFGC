public function up(): void
{
    Schema::create('equipes', function (Blueprint $table) {
        $table->id();
        $table->string('nome')->unique();
        $table->string('cidade')->nullable(); // OU relacionar com tabela cidades depois
        $table->string('responsavel')->nullable();
        $table->string('telefone')->nullable();
        $table->string('email')->nullable();
        $table->timestamps();
    });
}
