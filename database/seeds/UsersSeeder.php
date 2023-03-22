<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Tayson Perseo',
            'email' => 'taytay@gmail.com',
            'password'=> bcrypt('12345678')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Taqueo',
            'email' => 'taqueo@gmail.com',
            'password'=> bcrypt('12345678')
        ])->assignRole('Encargado');

        $users = factory(User::class, 20)->create()->each(function ($user) {
            $user->assignRole('Usuario');
        });
        
        dd($users->toArray()); // Verificar el contenido del arreglo
        
        DB::table('users')->insert($users->toArray());
    }
}