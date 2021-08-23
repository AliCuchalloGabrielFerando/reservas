<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contador_pagina extends Model
{
    use HasFactory;
    protected $table = 'contador_pagina';

    protected $fillable = [
         'nombre', 'visitas',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
