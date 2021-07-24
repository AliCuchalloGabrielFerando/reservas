<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupo extends Model
{
    use HasFactory;

    protected $table = 'grupo';

    protected $fillable = [
        'alta_baja', 'descripcion', 'fechaR', 'nombre', 'usuario',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function privilegio(){
        return $this->hasMany(privilegio::class,
            'grupo_id', 'id');
    }

    public function usuario(){
        return $this->hasMany(User::class,
            'grupo_id', 'id');
    }
}
