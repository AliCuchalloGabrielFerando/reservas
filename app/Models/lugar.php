<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lugar extends Model
{
    use HasFactory;

    protected $table = 'lugar';

    protected $fillable = [
        'alta_baja', 'capacidad', 'codigo_lugar', 'descripcion_de_ubicacion', 'fechaR',
        'usuario', 'tipo_lugar_id', 'modulo_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function modulo(){
        return $this->belongsTo(modulo::class,
            'modulo_id', 'id');
    }

    public function tipo_lugar(){
        return $this->belongsTo(tipo_lugar::class,
            'tipo_lugar_id', 'id');
    }

    public function reserva_lugar(){
        return $this->hasMany(reserva_lugar::class,
            'lugar_id', 'id');
    }

    public function equipo(){
        return $this->hasMany(equipo::class,
            'lugar_id', 'id');
    }

    public function requisitos_software(){
        return $this->hasMany(requisitos_software::class,
            'lugar_id', 'id');
    }
}
