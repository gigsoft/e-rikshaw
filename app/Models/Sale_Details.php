<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_Details extends Model
{
    protected $table = 'sale_details';
    protected $fillable = [
        'order_id',
        'item_id',
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



}
