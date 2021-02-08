<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevelopersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('developers')->insert([
            [
                'nome'            => 'Marlene Emanuelly Galvão',
                'sexo'            => 'F',
                'idade'           => 31,
                'hobby'           => 'Pintura',
                'data_nascimento' => '1990-01-01',
                'created_at'      => '2021-02-01',
                'updated_at'      => '2021-02-01'
            ],
            [
                'nome'            => 'João de Souza Santo',
                'sexo'            => 'M',
                'idade'           => 60,
                'hobby'           => 'Pescar Embarcado',
                'data_nascimento' => '1960-12-19',
                'created_at'      => '2021-02-01',
                'updated_at'      => '2021-02-01'
            ],
            [
                'nome'            => 'Felipe dos Santos',
                'sexo'            => 'M',
                'idade'           => 20,
                'hobby'           => 'Aeromodelismo',
                'data_nascimento' => '2001-01-15',
                'created_at'      => '2021-02-01',
                'updated_at'      => '2021-02-01'
            ],
            [
                'nome'            => 'Isis Evelyn Agatha Peixoto',
                'sexo'            => 'F',
                'idade'           => 26,
                'hobby'           => 'Correr',
                'data_nascimento' => '1995-01-05',
                'created_at'      => '2021-02-01',
                'updated_at'      => '2021-02-01'
            ]
        ]);
    }
}
