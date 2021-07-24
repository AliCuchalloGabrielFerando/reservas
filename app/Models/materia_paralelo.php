<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materia_paralelo extends Model
{
    use HasFactory;

    protected $table = 'materia_paralelo';

    protected $fillable = [
        'nombre', 'materia_id', 'paralelo_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function materia(){
        return $this->belongsTo(materia::class,
            'materia_id', 'id');
    }

    public function paralelo(){
        return $this->belongsTo(paralelo::class,
            'paralelo_id', 'id');
    }

    public function reserva(){
        return $this->hasMany(reserva::class,
            'materia_paralelo_id', 'id');
    }
}
