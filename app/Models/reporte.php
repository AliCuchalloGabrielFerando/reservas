<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reporte extends Model
{
    use HasFactory;
    protected $table = 'reporte';
    protected $fillable = [
        'tipo_usuario','identificador','nombre_usuario','operacion','fecha',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
