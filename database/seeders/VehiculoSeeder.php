<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = DB::table('cliente')->pluck('idCliente')->toArray();
        $marcas = ['Toyota', 'Nissan', 'Ford', 'Hyundai', 'Chevrolet', 'Kia', 'Honda'];
        $modelos = ['Sedan', 'SUV', 'Pickup', 'Hatchback', 'Coupe'];

        for ($i = 1; $i <= 50; $i++) {
            DB::table('vehiculo')->insert([
                'marca' => $marcas[array_rand($marcas)],
                'modelo' => $modelos[array_rand($modelos)],
                'placa' => strtoupper('ABC' . rand(100, 999) . $i),
                'anioFabricacion' => rand(2005, 2024),
                'idCliente' => $clientes[array_rand($clientes)],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
