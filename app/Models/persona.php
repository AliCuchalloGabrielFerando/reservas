<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    use HasFactory;

    protected $table = 'persona';

    protected $fillable = [
        'apellidoP', 'apellidoM', 'nombre', 'ci',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function docente(){
        return $this->hasOne(docente::class,
            'persona_ci', 'ci');
    }

    public function externo_lab(){
        return $this->hasOne(externo_lab::class,
            'persona_ci', 'ci');
    }

    public function jefe_lab(){
        return $this->hasOne(jefe_lab::class,
            'persona_ci', 'ci');
    }

    public function auxiliar(){
        return $this->hasOne(auxiliar::class,
            'persona_ci', 'ci');
    }

    public function reserva(){
        return $this->hasMany(reserva::class,
            'persona_ci', 'ci');
    }
}
