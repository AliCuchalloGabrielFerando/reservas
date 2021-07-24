<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gestion_academica extends Model
{
    use HasFactory;

    protected $table = 'gestion_academica';

    protected $fillable = [
        'alta_baja', 'anio', 'estado', 'fechaR', 'semestre', 'usuario',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function reserva(){
        return $this->hasMany(reserva::class,
            'gestion_academica_id', 'id');
    }
}
