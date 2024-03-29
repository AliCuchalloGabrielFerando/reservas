<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materia_grupom extends Model
{
    use HasFactory;

    protected $table = 'materia_grupom';

    protected $fillable = [
      'materia_id', 'grupom_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function materia(){
        return $this->belongsTo(materia::class,
            'materia_id', 'id');
    }

    public function grupom(){
        return $this->belongsTo(grupom::class,
            'grupom_id', 'id');
    }

    public function reserva(){
        return $this->hasMany(reserva::class,
            'materia_paralelo_id', 'id');
    }
}
