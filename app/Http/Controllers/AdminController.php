<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // View Dashboard
    public function index()
    {
        $users = User::all();
        $jobposts = JobPost::all();
        return view('admin.dashboard', compact('users') , compact('jobposts'));
    }


}