<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidades extends Model
{
    protected $table = 'unidades';
    protected $primaryKey = 'unidad_id';
    protected $fillable=[
        'unidad_id',
        'item_id',
        'imp',
        'estado',
    ];

    public function  item(){
        return $this->belongsTo(Item::class, 'item_id', 'item_id');
    }

}
