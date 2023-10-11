<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey = 'id_producto';
    public $timestamps = false;


    use HasFactory;
    protected $fillable = [
        'nombre', 'descripcion', 'precio', 'existencia' // Agrega aquí los campos de tu modelo
    ];
}
