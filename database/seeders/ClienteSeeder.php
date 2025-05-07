<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('cliente')->insert([
                'nombre' => 'Nombre' . $i,
                'apellidos' => 'Apellido' . $i,
                'numeroDocumento' => 'DOC' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'telefono' => '9' . rand(10000000, 99999999),
                'email' => 'cliente' . $i . '@example.com',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
