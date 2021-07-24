<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jefe_lab extends Model
{
    use HasFactory;

    protected $table = 'jefe_lab';

    protected $fillable = [
        'cod', 'correo', 'telefono', 'persona_ci',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function persona(){
        return $this->belongsTo(persona::class,
            'persona_ci', 'ci');
    }

    public function usuario(){
        return $this->hasMany(User::class,
            'jefe_lab_cod', 'cod');
    }
}
