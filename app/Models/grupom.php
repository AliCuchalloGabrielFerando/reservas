<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupom extends Model
{
    use HasFactory;

    protected $table = 'grupom';

    protected $fillable = [
        'nombre',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function materia_grupom(){
        return $this->hasMany(materia_grupom::class,
            'grupom_id', 'id');
    }
}
