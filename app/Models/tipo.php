<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{
    use HasFactory;

    protected $table = 'tipo';

    protected $fillable = [
        'alta_baja', 'descripcion', 'fechaR', 'usuario',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function equipo(){
        return $this->hasMany(equipo::class,
            'tipo_id', 'id');
    }
}
