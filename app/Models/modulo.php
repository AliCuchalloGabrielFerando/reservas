<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modulo extends Model
{
    use HasFactory;

    protected $table = 'modulo';

    protected $fillable = [
        'nro', 'facultad_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function facultad(){
        return $this->belongsTo(facultad::class,
            'facultad_id', 'id');
    }

    public function lugar(){
        return $this->hasMany(lugar::class,
            'modulo_id', 'id');
    }
}
