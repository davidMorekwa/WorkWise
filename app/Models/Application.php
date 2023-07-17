<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'resume',
        'job_id',
        'user_id'

    ];
    use HasFactory;
    protected $dates = ['deleted_at'];
    // public function organization()
    // {
    //     return $this->belongsTo(Organization::class);
    // }

    // app/Models/AppliedJob.php

    protected $guarded = [];

    public function job()
    {
        return $this->belongsTo(JobPost::class, 'job_id');
    }
    
}