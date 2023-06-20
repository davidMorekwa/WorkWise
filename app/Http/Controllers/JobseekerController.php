<?php

namespace App\Http\Controllers;

use App\Models\jobseekers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobseekerController extends Controller
{
    public function updateprofile()
    {
        return view('jobseeker.updateprofile');
    }

    public function viewprofile()
    {
        return view('jobseeker.myprofile');
    }


    public function createProfile(Request $request)
    {
        // dd($request);
        jobseekers::create([
            'userId' => Auth::user()->id,
            'fname' => $request->fname,
            'email' => $request->email,
            'lname' => $request->lname,
            'phone_number' => $request->phone_number,
            'self_description' => $request->self_description,
            'cv' => $request->cv,
        ]);
        return view('jobseeker.myprofile');

    }

    public function showProfile()
    {
        $profile_data = jobseekers::where('userId', Auth::user()->id)->first();
        return view('jobseeker.myprofile')->with('Profile', $profile_data);
    }
}