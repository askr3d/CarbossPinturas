<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'fk_permiso',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        /*'email_verified_at' => 'datetime'*/
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function permiso()
    {
        return $this->belongsTo(Permiso::class, 'fk_permiso','id_permiso');
    }

    public function orders()
    {
        return $this->hasMany(Orden::class, 'fk_user');
    }
}
