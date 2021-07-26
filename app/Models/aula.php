<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aula extends Model
{
    use HasFactory;

    protected $table = 'aula';

    protected $fillable = [
        'alta_baja', 'capacidad', 'codigo_aula', 'descripcion_de_ubicacion', 'fechaR',
        'usuario', 'tipo_aula_id', 'modulo_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function modulo(){
        return $this->belongsTo(modulo::class,
            'modulo_id', 'id');
    }

    public function tipo_aula(){
        return $this->belongsTo(tipo_aula::class,
            'tipo_aula_id', 'id');
    }

    public function reserva_aula(){
        return $this->hasMany(reserva_aula::class,
            'aula_id', 'id');
    }

    public function equipo(){
        return $this->hasMany(equipo::class,
            'aula_id', 'id');
    }

    public function requisitos_software(){
        return $this->hasMany(requisitos_software::class,
            'aula_id', 'id');
    }
}
