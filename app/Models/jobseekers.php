<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class jobseekers extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_of_birth',
        'education',
        'experience',
        'skills',
        'achievements',
        'field',
        'certifications',
        'hobbies',
        'self_desription',
        'cv',
        'userId',
    ];


}
