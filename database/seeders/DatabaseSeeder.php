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

        //Fazendo assim ele executa seeder q vc pediu em especifico
        //que grava dados que necessitam estar la antes de tudo
        //fazendo isso vc pode executar as factory normalmente dps
        $this->call([MotivoContatoSeeder::class]);
        \App\Models\User::factory(10)->create();
        \App\models\Contato::factory(100)->create();
        \App\models\Fornecedor::factory(20)->create();
    }
}
