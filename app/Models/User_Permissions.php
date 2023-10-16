<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Permissions extends Model
{
    protected $table = 'user_permissions';
    protected $primaryKey = 'id';
    protected $fillable = [

        'user_id',
        'role_id',
        'permission_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


}
