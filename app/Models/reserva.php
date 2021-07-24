<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
{
    use HasFactory;

    protected $table = 'reserva';

    protected $fillable = [
        'alta_baja', 'actividad', 'estado', 'fecha_inicio_reserva', 'fecha_fin_reserva',
        'prioridad', 'semanal', 'materia_paralelo_id', 'gestion_academica_id',
        'docente_cod', 'persona_ci',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function materia_paralelo(){
        return $this->belongsTo(materia_paralelo::class,
            'materia_paralelo_id', 'id');
    }

    public function gestion_academica(){
        return $this->belongsTo(gestion_academica::class,
            'gestion_academica_id', 'id');
    }

    public function docente(){
        return $this->belongsTo(docente::class,
            'docente_cod', 'cod');
    }

    public function persona(){
        return $this->belongsTo(persona::class,
            'persona_ci', 'ci');
    }

    public function reserva_lugar(){
        return $this->hasMany(reserva_lugar::class,
            'reserva_id', 'id');
    }
}
