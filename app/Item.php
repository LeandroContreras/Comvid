<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Item extends Model
{
    use Notifiable;
    
    protected $table = 'items';
    // ...
    protected $primaryKey = 'item_id';
    public $incrementing = false;
    // ...
    
    protected $fillable = [
        'item_id',
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
    public function unidades()
    {
    return $this->hasMany('App\Unidades', 'unidad_id');
    }
}
