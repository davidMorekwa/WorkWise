<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiters extends Model
{
    use HasFactory;
    protected $fillable = [
        'organisation_name',
        'location',
        'about',
        'industry',
        'website',
        'email',
        'userId'
    ];
}
