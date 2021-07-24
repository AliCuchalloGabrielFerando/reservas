<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materia extends Model
{
    use HasFactory;

    protected $table = 'materia';

    protected $fillable = [
        'nombre', 'sigla', 'creditos', 'nivel', 'carrera_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function carrera(){
        return $this->belongsTo(carrera::class,
            'carrera_id', 'id');
    }

    public function materia_paralelo(){
        return $this->hasMany(materia_paralelo::class,
            'materia_id', 'id');
    }
}
