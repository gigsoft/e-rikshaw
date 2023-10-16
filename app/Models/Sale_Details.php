<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_Details extends Model
{
    protected $table = 'sale_details';
    protected $fillable = [
        'order_id',
        'store_id',
        'item_id',
        'vehicle_id',
        'quantity',
        'price',
        'tax',
        'total_price',
        'status',



    ];
    public function itemData()
    {
        return $this->hasOne(Items::class, 'item_id');
    }

    public function sale_headers()
    {
        return $this->hasOne(Sale_Headers::class, 'id', 'user_id');
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
    public function vehicles()
    {
        return $this->belongsTo(Vechiles_Model::class, 'vehicle_id');
    }
}
