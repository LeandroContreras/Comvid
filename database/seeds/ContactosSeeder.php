<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contactos')->insert([
            'nombres'=>'Leandro',
            'apellidos'=>'Contreras',
            'telefono'=>'76563835',
            'tipo'=>'Proveedor',
            'departamento'=>'La Paz',
            'descripcion'=>'Este es el primero',
            'user_id'=>5,
            'email'=>'lintra@gmail.com',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('contactos')->insert([
            'nombres'=>'Leoncio',
            'apellidos'=>'Contres',
            'telefono'=>'74363835',
            'tipo'=>'Cliente',
            'departamento'=>'Cochabamba',
            'user_id'=>2,
            'empresa'=>'Automovil Club',
            'email'=>'leonel@gmail.com',
            'descripcion'=>'Este es el segundo',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('contactos')->insert([
            'nombres'=>'Leonel',
            'apellidos'=>'Sparta',
            'telefono'=>'76562135',
            'tipo'=>'Proveedor',
            'departamento'=>'Santa Cruz',
            'descripcion'=>'Este es el tercero',
            'user_id'=>2,
            'empresa'=>'acb',
            'email'=>'esparta@gmail.com',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
