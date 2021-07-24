<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paralelo extends Model
{
    use HasFactory;

    protected $table = 'paralelo';

    protected $fillable = [
        'nombre',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function materia_paralelo(){
        return $this->hasMany(materia_paralelo::class,
            'paralelo_id', 'id');
    }
}
