<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_Headers extends Model
{
    protected $table = 'purchase_header';
    protected $fillable = [

        'vehicle_id',
        'supplier_name',
        'supplier_contact_no',
        'date',
        'amount',
        'tex_amount',
        'total_amount',


    ];

    // public function vehicles()
    // {
    //     return $this->hasOne(Vechiles_Model::class, 'id');
    // }
    public function items()
    {
        return $this->hasMany(Purchase_Details::class, 'order_id');
    }

    public function vehicles()
    {
        return $this->belongsTo(Vechiles_Model::class, 'vehicle_id');
    }

}
