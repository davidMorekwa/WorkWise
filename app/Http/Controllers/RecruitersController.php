<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecruitersController extends Controller
{

    public function home()
    {
        return view('recruiters.home');
    }
    
    public function registration() {
        return view('recruiters.register');
    }
}
