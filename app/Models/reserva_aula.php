<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva_aula extends Model
{
    use HasFactory;

    protected $table = 'reserva_aula';

    protected $fillable = [
        'dia', 'fecha', 'hora_inicio', 'hora_fin', 'reserva_id', 'aula_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function reserva(){
        return $this->belongsTo(reserva::class,
            'reserva_id', 'id');
    }

    public function aula(){
        return $this->belongsTo(aula::class,
            'aula_id', 'id');
    }
}
