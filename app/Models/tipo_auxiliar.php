<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_auxiliar extends Model
{
    use HasFactory;

    protected $table = 'tipo_auxiliar';

    protected $fillable = [
        'alta_baja', 'carga_horaria', 'fechaR', 'usuario', 'descripcion',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function auxiliar(){
        return $this->belongsTo(auxiliar::class,
            'tipo_auxiliar_id', 'id');
    }
}
