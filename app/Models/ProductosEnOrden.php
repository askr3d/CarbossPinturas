<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosEnOrden extends Model
{
    use HasFactory;
    protected $table = 'productos_en_orden';
    protected $primaryKey = 'id_producto_orden';
    protected $fillable = [
        'cantidad',
        'precio',
    ];
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'fk_producto');
    }

}
