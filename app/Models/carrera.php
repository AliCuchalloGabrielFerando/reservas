<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{
    use HasFactory;

    protected $table = 'carrera';

    protected $fillable = [
        'abreviatura', 'codigo', 'nombre', 'universidad_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function facultad(){
        return $this->belongsTo(facultad::class,
            'facultad_id', 'id');
    }

    public function materia(){
        return $this->hasMany(materia::class,
            'carrera_id', 'id');
    }
}
