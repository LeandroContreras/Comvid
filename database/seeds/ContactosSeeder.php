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
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('contactos')->insert([
            'nombres'=>'Leoncio',
            'apellidos'=>'Contres',
            'telefono'=>'74363835',
            'tipo'=>'Cliente',
            'departamento'=>'Cochabamba',
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
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
