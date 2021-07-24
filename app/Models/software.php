<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class software extends Model
{
    use HasFactory;

    protected $table = 'software';

    protected $fillable = [
        'nombre',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function software_version(){
        return $this->hasMany(software_version::class,
            'software_id', 'id');
    }
}
