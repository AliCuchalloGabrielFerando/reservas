<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class externo_lab extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod';
    protected $table = 'externo_lab';

    protected $fillable = [
        'cod','correo',  'persona_ci',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function persona(){
        return $this->belongsTo(persona::class,
            'persona_ci', 'ci');
    }
}
