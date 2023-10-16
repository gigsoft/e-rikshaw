<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_Details extends Model
{
    protected $table = 'purchase_details';
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
        return $this->belongsTo(Items::class, 'item_id');
    }

    public function vehicles()
    {
        return $this->belongsTo(Vechiles_Model::class, 'vehicle_id');
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function stores()
    {
        return $this->belongsTo(Stores::class, 'store_id');
    }

    public function purchase_header()
    {
        return $this->belongsTo(Purchase_Headers::class, 'order_id');
    }
}
