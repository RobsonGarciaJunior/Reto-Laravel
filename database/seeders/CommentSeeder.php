<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            'text' => 'Si, el otro dia pasé por la puerta del departamento de Informática y vi como algunos equipos se encontraban en el suelo.',
            'usedTime' => 1,
            'incidencyId' => 1,
            'userId' => 1,
            'created_at' => now(),
        ]);
        DB::table('comments')->insert([
            'text' => 'Sí, mira a ver en los registros antiguos, creo que tenian 2 direcciones puestas, su nueva dirección es la nº 2',
            'usedTime' => 1,
            'incidencyId' => 3,
            'userId' => 2,
            'created_at' => now(),
        ]);
        DB::table('comments')->insert([
            'text' => 'Veré si puedo ponerme en contacto con Recursos Humanos e informarles de la situación.',
            'usedTime' => 4,
            'incidencyId' => 4,
            'userId' => 4,
            'created_at' => now(),
        ]);
        DB::table('comments')->insert([
            'text' => 'Supongo que se les habrá olvidado al departamento de ventas pasarnos la factura, me pondré en contacto con ellos y en cuanto sepa algo, te llamo.',
            'usedTime' => 3,
            'incidencyId' => 2,
            'userId' => 5,
            'created_at' => now(),
        ]);
        DB::table('comments')->insert([
            'text' => 'Actualización: Han llegado 2 mesas, pero el tamaño no es el correcto',
            'usedTime' => 2,
            'incidencyId' => 1,
            'userId' => 4,
            'created_at' => now(),
        ]);
    }
}
