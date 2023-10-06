<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    protected $table = 'stores';
    protected $fillable = [
        'name',
        'address',
        'image',
        'email',
        'phone_no',
        'status',

    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function purchase_headers()
    {
        return $this->hasOne(Purchase_Headers::class, 'id', 'user_id');
    }
    public function purchase_details()
    {
        return $this->hasOne(Purchase_Details::class, 'id', 'user_id');
    }
    

    public function sale_headers()
    {
        return $this->hasOne(Sale_Headers::class, 'id', 'user_id');
    }
}
