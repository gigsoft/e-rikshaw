<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hierer extends Model
{
    protected $table = 'hierer';
    protected $fillable = [
        'vehicle_id',
        'name',
        'profile_image',
        'adhar_card',
        'pan_card',
        'electricty_bill',
        'bank_copy',
        'contact_1',
        'contact_2',
        'contact_3',

    ];
    public function vehicle()
    {
        return $this->belongsTo(Vehicles::class, 'vehicle_id');
    }


}
