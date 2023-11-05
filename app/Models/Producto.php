<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_producto';


    protected $fillable = [
        'nombre', 'descripcion', 'imagen',' precio', 'existencia' // Agrega aquí los campos de tu modelo
    ];
}
