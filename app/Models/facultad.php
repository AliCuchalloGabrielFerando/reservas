<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facultad extends Model
{
    use HasFactory;

    protected $table = 'facultad';

    protected $fillable = [
        'abreviatura', 'codigo', 'nombre', 'universidad_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function universidad(){
        return $this->belongsTo(universidad::class,
            'universidad_id', 'id');
    }

    public function carrera(){
        return $this->hasMany(carrera::class,
            'facultad_id', 'id');
    }

    public function modulo(){
        return $this->hasMany(modulo::class,
            'facultad_id', 'id');
    }
}
