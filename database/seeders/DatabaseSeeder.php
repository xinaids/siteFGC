<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Chama os seeders que você quer executar
        $this->call([
            CidadesRSSeeder::class,
        ]);
    }
}
