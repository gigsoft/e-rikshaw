<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hierer_cheques extends Model
{
    protected $table = 'hierer_cheques';
    protected $fillable = [
        'hierer_id',
        'name',
        'image',
    ];


}
