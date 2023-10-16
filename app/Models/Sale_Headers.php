<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_Headers extends Model
{
    protected $table = 'sale_header';
    protected $fillable = [


        'supplier_name',
        'supplier_contact_no',
        'store_id',
        'date',
        'amount',
        'tex_amount',
        'total_amount',
        'status'
    ];

    // public function vehicles()
    // {
    //     return $this->hasOne(Vechiles_Model::class, 'id');
    // }
    public function items()
    {
        return $this->hasMany(Sale_Details::class, 'order_id');
    }

    public function vehicles()
    {
        return $this->belongsTo(Vechiles_Model::class, 'vehicle_id');
    }
    public function stores()
    {
        return $this->belongsTo(Stores::class, 'store_id');
    }
    public function sale_details()
    {
        return $this->hasMany(Sale_Details::class, 'order_id');
    }

    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id');
    }
}
