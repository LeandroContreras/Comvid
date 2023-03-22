<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'categoria_id',
        'descripcion',
        'tamaño',
        'eje',
        'color',
        'forma',
        'tipo',
        'funcion',
        'malla',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
