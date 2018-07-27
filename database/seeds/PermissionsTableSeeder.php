<?php

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        //navegar
        Permission::create([
            'name'=>         'Navegar usuarios',
            'slug'=>         'users.index',
            'description'=>  'Lista y navega todos los usuarios',
        ]);
        //ver show
        Permission::create([
            'name'=>         'Ver detalles del  usuarios',
            'slug'=>         'users.show',
            'description'=>  'Ver en detalle cada uno de  los usuarios',
        ]);
        //editar
        Permission::create([
            'name'=>         'Editar usuarios',
            'slug'=>         'users.edit',
            'description'=>  'Editar cualquier dato de un usuario del sistema',
        ]);
        //eliminar
        Permission::create([
        'name'=>         'Eliminar usuarios',
        'slug'=>         'users.delete',
        'description'=>  'Eliminar cualquier  usuario del sistema',
        ]);

        //Roles

        //navegar
        Permission::create([
            'name'=>         'Navegar roles',
            'slug'=>         'roles.index',
            'description'=>  'Lista y navega todos los roles',
        ]);
        //ver show
        Permission::create([
            'name'=>         'Ver detalles del  roles',
            'slug'=>         'roles.show',
            'description'=>  'Ver en detalle cada uno de  los roles',
        ]);
        //crear
        Permission::create([
            'name'=>         'Crear roles',
            'slug'=>         'roles.create',
            'description'=>  'Editar cualquier dato de un rol del sistema',
        ]);
        //editar
        Permission::create([
            'name'=>         'Editar roles',
            'slug'=>         'roles.edit',
            'description'=>  'Editar cualquier dato de un rol del sistema',
        ]);
        //eliminar
        Permission::create([
            'name'=>         'Eliminar roles',
            'slug'=>         'roles.delete',
            'description'=>  'Eliminar cualquier  rol del sistema',
        ]);

        //Productos

        //navegar
        Permission::create([
            'name'=>         'Navegar dependencias',
            'slug'=>         'dependencias.index',
            'description'=>  'Lista y navega todos las dependencias',
        ]);
        //ver show
        Permission::create([
            'name'=>         'Ver detalles del  dependencias',
            'slug'=>         'dependencias.show',
            'description'=>  'Ver en detalle cada uno de  las dependencias',
        ]);
        //crear
        Permission::create([
            'name'=>         'Crear dependencias',
            'slug'=>         'dependencias.create',
            'description'=>  'Editar cualquier dato de una dependencia del sistema',
        ]);
        //editar
        Permission::create([
            'name'=>         'Editar dependencias',
            'slug'=>         'dependencias.edit',
            'description'=>  'Editar cualquier dato de un dependencia del sistema',
        ]);
        //eliminar
        Permission::create([
            'name'=>         'Eliminar dependencias',
            'slug'=>         'dependencias.delete',
            'description'=>  'Eliminar cualquier  dependencia del sistema',
        ]);


    }
}
