<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class entrada extends Model
{
    protected $fillable = [
        'id_produto',
        'quantidade'
    
    ];
}
