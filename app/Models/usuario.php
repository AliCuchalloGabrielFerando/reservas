<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';

    protected $fillable = [
        'alta_baja', 'contraseña', 'fechaR', 'nombre', 'usuario', 'grupo_id',
        'auxiliar_cod', 'jefe_lab_cod', 'docente_cod',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
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
