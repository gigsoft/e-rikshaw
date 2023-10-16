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
        'store_id',
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
    public function purchase_details()
    {
        return $this->hasOne(Purchase_Details::class, 'id', 'user_id');
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicles::class, 'vehicle_id');
    }
    public function store()
    {
        return $this->belongsTo(Stores::class, 'store_id');
    }




}
