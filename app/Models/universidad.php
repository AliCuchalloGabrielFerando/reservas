<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class universidad extends Model
{
    use HasFactory;

    protected $table = 'universidad';

    protected $fillable = [
        'abreviatura', 'nombre',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function facultad(){
        return $this->hasMany(facultad::class,
            'universidad_id', 'id');
    }
}
