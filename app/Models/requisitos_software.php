<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requisitos_software extends Model
{
    use HasFactory;

    protected $table = 'reserva_lugar';

    protected $fillable = [
        'fecha_actualizacion', 'software_version_id', 'lugar_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function lugar(){
        return $this->belongsTo(lugar::class,
            'lugar_id', 'id');
    }

    public function software_version(){
        return $this->belongsTo(software_version::class,
            'software_version_id', 'id');
    }
}
