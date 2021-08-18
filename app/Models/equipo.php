<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipo extends Model
{
    use HasFactory;

    protected $table = 'equipo';

    protected $fillable = [
        'alta_baja', 'codigo_activo', 'descripcion', 'disponibilidad', 'estado',
        'fechaR', 'num_for_asignado', 'prestable', 'usuario', 'tipo_id', 'aula_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function aula(){
        return $this->belongsTo(aula::class,
            'aula_id', 'id');
    }

    public function tipo(){
        return $this->belongsTo(tipo::class,
            'tipo_id', 'id');
    }
}
