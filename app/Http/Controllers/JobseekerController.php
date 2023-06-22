<?php

namespace App\Http\Controllers;

use App\Models\jobseekers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'fname' => $request->fname,
            'email' => $request->email,
            'lname' => $request->lname,
            'phone_number' => $request->phone_number,
            'self_description' => $request->self_description,
            'cv' => $request->cv,
            'userId' => Auth::user()->id,
        ]);
        return view('jobseeker.myprofile');

    }

    public function showProfile()
    {
        $profile_data = jobseekers::where('userId', Auth::user()->id)->first();
        return view('jobseeker.viewprofile')->with('Profile', $profile_data);
    }

    public function fetchtest()
    {
        $data = DB::table('jobseekers')->where('userId', Auth::user()->id)->first();
        // dd($data);
        return view('jobseeker.viewprofile')->with('profile_data', $data);

    }
}