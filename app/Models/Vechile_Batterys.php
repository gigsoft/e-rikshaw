<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vechile_Batterys extends Model
{
    protected $table = 'vehicles_batterys';
    protected $fillable = [
        'vehicle_id',
        'battery_1',
        'battery_2',
        'battery_3',
        'battery_4',
        'battery_5',
    ];
}
