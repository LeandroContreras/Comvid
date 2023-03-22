<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table = 'ventas';
    
    protected $fillable = [
        'id',
        'cliente_id',
        'user_id',
        'item_id',
        'descripcion',
        'cantidad',
        'estado',
        'fecha',
        'created_at',
        'updated_at'
    ];

    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function contacto(){
        return $this->belongsTo(Contacto::class);
    }
}
