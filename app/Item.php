<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    
    protected $fillable = [
        'id',
        'categoria_id',
        'contacto_id',
        'descripcion',
        'precio',
        'estado',
        'stock',
        'reorden',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function contacto(){
        return $this->belongsTo(Contacto::class);
    }
}
