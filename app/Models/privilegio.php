<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class privilegio extends Model
{
    use HasFactory;

    protected $table = 'privilegio';

    protected $fillable = [
        'alta_baja', 'accion', 'fechaR', 'usuario', 'grupo_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function grupo(){
        return $this->belongsTo(grupo::class,
            'grupo_id', 'id');
    }
}
