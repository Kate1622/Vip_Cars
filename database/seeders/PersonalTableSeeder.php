<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('personal')->insert([
            [
                'PER_Id' => 1,
                'PER_Nombre' => 'ABNER ELIAS',
                'PER_Apellido' => 'MERLO ALVITES',
                'PER_TipoDocumento' => 'DNI',
                'PER_NumeroDocumento' => '73662777',
                'PER_FechaNacimiento' => '1998-06-20',
                'PER_Edad' => 25,
                'PER_Sexo' => 'MASCULINO',
                'PER_EstadoCivil' => 'CASADO',
                'PER_NumeroHijos' => 1,
                'PER_Procedencia' => 'PACASMAYO - PACASMAYO - LA LIBERTAD',
                'PER_Direccion' => 'LAS PALMERAS MZ X LT 25',
                'PER_Referencia' => 'PLAZA',
                'PER_Correo' => '-',
                'PER_Celular' => '123456789',
                'PER_Parenteso' => null,
                'PER_PNombre' => null,
                'PER_PCelular' => null,
                'PER_PDireccion' => null,
                'PER_Parenteso2' => null,
                'PER_PNombre2' => null,
                'PER_PCelular2' => null,
                'PER_PDireccion2' => null,
                'PUE_Id' => null,
                'PER_Carrera' => null,
                'PER_GradoAcademico' => null,
                'PER_EstadoLaboral' => 'ACTIVO',
                'ARE_Id' => null,
                'PER_TPolo' => null,
                'PER_TPantalon' => null,
                'PER_TZapatos' => null,
                'PER_Titular' => null,
                'PER_Banco' => null,
                'PER_NumeroCuenta' => null,
                'PER_CCI' => null,
                'PER_Documento' => null,
                'PER_Foto' => '1.jpg',
                'PER_CV' => null,
                'PER_ListaNegra' => null,
            ],
            [
                'PER_Id' => 2,
                'PER_Nombre' => 'Manuel',
                'PER_Apellido' => 'Vargas Azañero',
                'PER_TipoDocumento' => 'DNI',
                'PER_NumeroDocumento' => '74895678',
                'PER_FechaNacimiento' => '1995-05-15',
                'PER_Edad' => 28,
                'PER_Sexo' => 'MASCULINO',
                'PER_EstadoCivil' => null,
                'PER_NumeroHijos' => 0,
                'PER_Procedencia' => '-',
                'PER_Direccion' => '-',
                'PER_Referencia' => '-',
                'PER_Correo' => '-',
                'PER_Celular' => '55555',
                'PER_Parenteso' => null,
                'PER_PNombre' => null,
                'PER_PCelular' => null,
                'PER_PDireccion' => null,
                'PER_Parenteso2' => null,
                'PER_PNombre2' => null,
                'PER_PCelular2' => null,
                'PER_PDireccion2' => null,
                'PUE_Id' => null,
                'PER_Carrera' => null,
                'PER_GradoAcademico' => null,
                'PER_EstadoLaboral' => 'ACTIVO',
                'ARE_Id' => null,
                'PER_TPolo' => null,
                'PER_TPantalon' => null,
                'PER_TZapatos' => null,
                'PER_Titular' => null,
                'PER_Banco' => null,
                'PER_NumeroCuenta' => null,
                'PER_CCI' => null,
                'PER_Documento' => null,
                'PER_Foto' => null,
                'PER_CV' => null,
                'PER_ListaNegra' => null,
            ]
        ]);
    }
}
