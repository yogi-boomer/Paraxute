<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class TablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Tabla usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'eliminar-usuario',
            //Permisos de visualizacion
            'ver-alumno',
            'ver-usuarios',
            'ver-pagos',
            'registrar-alumno',
            //Roles
            'ver-rol',
            'crear-rol',
            'eliminar-rol',
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
