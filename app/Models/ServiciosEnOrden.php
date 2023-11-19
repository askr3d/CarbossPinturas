<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosEnOrden extends Model
{
    use HasFactory;
    protected $table = 'servicios_en_orden';
    protected $primaryKey = 'id_servicios_orden';
    protected $fillable = [
        'metros',
        'precio',
    ];
    public function Servicio_to_Orden()
    {
        return $this->belongsTo(User::class,'fk_orden','id_orden');
    }
    public function Servicio_to_Servicios()
    {
        return $this->belongsTo(User::class,'fk_servicio','id_servicio');
    }
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'fk_servicio');
    }
}
