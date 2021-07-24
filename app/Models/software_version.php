<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class software_version extends Model
{
    use HasFactory;

    protected $table = 'software_version';

    protected $fillable = [
        'nro_version', 'software_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function software(){
        return $this->belongsTo(software::class,
            'software_id', 'id');
    }
}
