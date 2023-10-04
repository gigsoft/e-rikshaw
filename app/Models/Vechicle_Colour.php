<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vechicle_Colour extends Model
{
     protected $table = 'vehicle_colour';
    protected $fillable = [
        'colour',

    ];
}
