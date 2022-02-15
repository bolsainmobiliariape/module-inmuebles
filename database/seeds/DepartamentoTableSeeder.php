<?php

namespace Database\Seeders;

use Bolsainmobiliariape\ModuleInmuebles\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $departamentos = [
            ['nombre' => 'AMAZONAS'],
            ['nombre' => 'ANCASH'],
            ['nombre' => 'APURIMAC'],
            ['nombre' => 'AREQUIPA'],
            ['nombre' => 'AYACUCHO'],
            ['nombre' => 'CAJAMARCA'],
            ['nombre' => 'CALLAO'],
            ['nombre' => 'CUSCO'],
            ['nombre' => 'HUANCAVELICA'],
            ['nombre' => 'HUÁNUCO'],
            ['nombre' => 'ICA'],
            ['nombre' => 'JUNÍN'],
            ['nombre' => 'LA LIBERTAD'],
            ['nombre' => 'LAMBAYEQUE'],
            ['nombre' => 'LIMA'],
            ['nombre' => 'LORETO'],
            ['nombre' => 'MADRE DE DIOS'],
            ['nombre' => 'MOQUEGUA'],
            ['nombre' => 'PASCO'],
            ['nombre' => 'PIURA'],
            ['nombre' => 'PUNO'],
            ['nombre' => 'SAN MARTÍN'],
            ['nombre' => 'TACNA'],
            ['nombre' => 'TUMBES'],
            ['nombre' => 'UCAYALI']
        ];
        //
        Departamento::insert($departamentos);
    }
}
