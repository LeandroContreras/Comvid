<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    protected $table = 'contactos';

    protected $fillable = [
        'id',
        'nombres',
        'apellidos',
        'telefono',
        'tipo',
        'departamento',
        'descripcion',
        'user_id',
        'created_at',
        'updated_at'
    ];
}

