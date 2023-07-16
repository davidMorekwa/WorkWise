<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $jobposts = JobPost::all();
        return view('admin.dashboard', compact('users') , compact('jobposts'));
    }

    // public function viewJobPost()
    // {
    //     $organizations = JobPost::where('status', 1)->get();
    //     return view('admin.dashboard', compact('organizations'));
    // }

    public function viewUsers()
    {
        $users = User::where('status', 1)->get();
        return view('admin.dashboard', compact('users'));
    }
}