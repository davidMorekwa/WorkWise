<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_title',
        'position_title',
        'overview',
        'responsibilities',
        'qualifications',
        'organisation',
        'status',
        'type'
    ];
}
