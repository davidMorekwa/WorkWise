<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobseekerController extends Controller
{
    public function jobseeker_profile()
    {
        return view('jobseeker.profile');
    }
}