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

}
