<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auxiliar extends Model
{
    use HasFactory;

    protected $table = 'auxiliar';
    protected $primaryKey = 'cod';
    protected $fillable = [
        'cod','cv', 'alta_baja', 'ciudad', 'codigo_aux', 'correo', 'fecha_nacimiento',
        'fechaR', 'numero_formulario', 'registro', 'telefono', 'usuario', 'persona_ci',
        'tipo_auxiliar_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function persona(){
        return $this->belongsTo(persona::class,
            'persona_ci', 'ci');
    }

    public function tipo_auxiliar(){
        return $this->belongsTo(tipo_auxiliar::class,
            'tipo_auxiliar_id', 'id');
    }

    public function usuario(){
        return $this->hasMany(User::class,
            'auxiliar_cod', 'cod');
    }
}
