<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docente extends Model
{
    use HasFactory;

    protected $table = 'docente';

    protected $fillable = [
        'cod', 'persona_ci',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function persona(){
        return $this->belongsTo(persona::class,
            'persona_ci', 'ci');
    }

    public function reserva(){
        return $this->hasMany(reserva::class,
            'docente_cod', 'cod');
    }
}
