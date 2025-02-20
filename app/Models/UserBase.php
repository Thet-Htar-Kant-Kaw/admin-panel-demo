<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBase extends Model
{
    protected $table = 'user_bases';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'msisdn',
        'company',
        'role'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
