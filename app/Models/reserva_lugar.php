<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva_lugar extends Model
{
    use HasFactory;

    protected $table = 'reserva_lugar';

    protected $fillable = [
        'dia', 'fecha', 'hora_inicio', 'hora_fin', 'reserva_id', 'lugar_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function reserva(){
        return $this->belongsTo(reserva::class,
            'reserva_id', 'id');
    }

    public function lugar(){
        return $this->belongsTo(lugar::class,
            'lugar_id', 'id');
    }
}
