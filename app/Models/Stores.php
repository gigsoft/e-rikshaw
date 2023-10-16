<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    protected $table = 'stores';
    protected $primaryKey = 'id';
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
    public function purchase_detail()
    {
        return $this->hasOne(Purchase_Details::class, 'id', 'user_id');
    }
   


}
