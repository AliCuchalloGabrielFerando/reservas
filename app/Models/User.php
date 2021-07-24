<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 
    protected $fillable = [
        'name',
        'email',
        'password',
        'alta_baja',
        'fechaR','usuario', 'grupo_id',
        'auxiliar_cod', 'jefe_lab_cod', 'docente_cod',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function grupo(){
        return $this->belongsTo(grupo::class,
            'grupo_id', 'id');
    }

    public function jefe_lab(){
        return $this->belongsTo(jefe_lab::class,
            'jefe_lab_cod', 'cod');
    }

    public function auxiliar(){
        return $this->belongsTo(auxiliar::class,
            'auxiliar_cod', 'cod');
    }

    public function docente(){
        return $this->belongsTo(docente::class,
            'docente_cod', 'cod');
    }
}
