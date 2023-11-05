<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $primaryKey = 'id_servicio';


    use HasFactory;
    protected $fillable = [
        'nombre', 'costo_por_m2'// Agrega aquí los campos de tu modelo
    ];
}
