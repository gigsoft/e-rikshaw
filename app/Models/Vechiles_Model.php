<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vechiles_Model extends Model
{
    protected $table = 'vehicles_model';
    protected $fillable = [
        'name',

    ];
    
}
