<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $fillables = [
        'Roles'
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updates_at' => 'datetime'
    ];

}
