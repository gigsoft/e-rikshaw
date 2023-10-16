<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = 'id';
    protected $fillable = [

        'name',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'User_Permissions', 'permission_id', 'user_id')->withPivot('role_id');
    }


}
