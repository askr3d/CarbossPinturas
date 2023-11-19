<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    protected $table = 'ordenes';
    protected $primaryKey = 'id_orden';
    protected $fillable = [
        'nombre',
        'status',
        'precio_total',
    ];

    public function User_to_Orden()
    {
        return $this->belongsTo(User::class,'fk_user','id');
    }

    public function ordenes()
    {
        return $this->belongsTo(User::class,'fk_user','id');
    }

    public function detalles_orden()
    {
        return $this->hasMany(ProductosEnOrden::class, 'fk_orden');
    }
}
