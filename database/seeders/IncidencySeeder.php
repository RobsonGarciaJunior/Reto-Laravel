<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncidencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incidencies')->insert([
            'title' => 'Mesas no llegan al departamento',
            'text' => 'Han habido varios problemas con esto relacionado a la a la compra de las mesas. 3 de nuestros empleados no pueden venir fisicamente a la empresa debido a que las mesas que solicitamos a nuestro proveedor aun no han llegado.',
            'estimatedTime' => 2,
            'categoryId' => 3,
            'departmentId' => 2,
            'userId' => 3,
            'priorityId' => 1,
            'stateId' => 1,
            'created_at' => now(),
        ]);
        DB::table('incidencies')->insert([
            'title' => 'No llega la factura del PD3343 de Navidad',
            'text' => 'Han habido varios problemas con esto relacionado al pedido anual que hacemos a la empresa NTI(No Tengo Imaginación). Y es que necesitamos la factura para cerrar las cuentas de la empresa, aún no hemos recibido ninguna respuesta.',
            'estimatedTime' => 1,
            'categoryId' => 4,
            'departmentId' => 3,
            'userId' => 2,
            'priorityId' => 2,
            'stateId' => 2,
            'created_at' => now(),
        ]);
        DB::table('incidencies')->insert([
            'title' => 'Se solicita información acerca de un cliente de la empresa',
            'text' => 'Han habido varios problemas con esto relacionado a que existe un cliente de la empresa del cual no tenemos registrado su nueva dirección en el sistema. Nos mandaron un correo informando el cambio de local de su sucursal pero no ha sido actualizada para el departamento informático.',
            'estimatedTime' => 5,
            'categoryId' => 2,
            'departmentId' => 1,
            'userId' => 1,
            'priorityId' => 1,
            'stateId' => 2,
            'created_at' => now(),
        ]);
        DB::table('incidencies')->insert([
            'title' => 'Falta de información en cuanto al horario de algunos becarios',
            'text' => 'Han habido varios problemas con esto relacionado a que no se tiene claro el horario de algunos becarios debido a la nueva política de empresa.',
            'estimatedTime' => 4,
            'categoryId' => 1,
            'departmentId' => 1,
            'userId' => 1,
            'priorityId' => 2,
            'stateId' => 3,
            'created_at' => now(),
        ]);
    }
}
