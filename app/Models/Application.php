<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'resume',
        'job_id',
        // 'user_id',
    ];
    use HasFactory;
    // public function organization()
    // {
    //     return $this->belongsTo(Organization::class);
    // }

}