<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vechiles extends Model
{
    protected $table = 'vehicles';
    protected $fillable = [
        'model_id',
        'name',
        'date',
        'color',
        'sales_price',
        'bill_price',
        'engine_no',
        'chassie_print',
        'down_payment',
        'financed_by',
        'insurance_amount_date',
        'emi_amount',
        'udhar',
        'rc_status',
        'pending_payment',
        'advance_payment',
        'cash_finance',

    ];

    public function hierers()
    {
        return $this->hasOne(Hierer::class, 'vehicle_id');
    }

    public function guaranters()
    {
        return $this->hasOne(Guranter::class, 'vehicle_id');
    }
    public function batteries()
    {
        return $this->hasOne(Vechile_Batterys::class, 'vehicle_id');
    }
}
