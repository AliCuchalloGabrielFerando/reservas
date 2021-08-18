<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
{
    use HasFactory;

    protected $table = 'reserva';

    protected $fillable = [
        'actividad',
        'fecha_inicio',
        'fecha_fin',

        'estado_id',
        'prioridad_id',
        'materia_grupom_id',
        'gestion_academica_id',
        'persona_ci',
        'jefe_lab_cod'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function materia_grupom(){
        return $this->belongsTo(materia_grupom::class,
            'materia_grupom_id', 'id');
    }

    public function gestion_academica(){
        return $this->belongsTo(gestion_academica::class,
            'gestion_academica_id', 'id');
    }

/*    public function docente(){
        return $this->belongsTo(docente::class,
            'docente_cod', 'cod');
    }*/

    public function persona(){
        return $this->belongsTo(persona::class,
            'persona_ci', 'ci');
    }

    public function reserva_aula(){
        return $this->hasMany(reserva_aula::class,
            'reserva_id', 'id');
    }
}
