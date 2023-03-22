<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidades extends Model
{
    protected $table = 'unidades';
    protected $fillable=[
        'id',
        'item_id',
        'imp',
        'estado',
    ];

    public function  item(){
        return $this->belongsTo(Item::class, 'id', 'item_id');
    }

}
