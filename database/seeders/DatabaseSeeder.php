<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\models\Contato::factory(100)->create();
        \App\models\Fornecedor::factory(20)->create();
        //$this->call(FornecedorSeeder::class);
        //$this->call(ContatoSeeder::class);
    }
}
