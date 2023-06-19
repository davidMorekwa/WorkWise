<?php

namespace App\Http\Controllers;

use App\Models\Recruiters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruitersController extends Controller
{
    // Show dashboard
    public function home()
    {
        return view('recruiters.home');
    }
    // Show profile creation form
    public function registration() {
        return view('recruiters.register');
    }
    // Create profile data
    public function createProfile(Request $request){
        // dd($request);
        Recruiters::create([
            'organisation_name' => $request->organisation_name,
            'email' => $request->email,
            'website' => $request->organisation_website,
            'location' => $request->country,
            'industry' => $request->industry,
            'about' => $request->aboutUs,
            'userId' => Auth::user()->id
        ]);
        return redirect()->route('RecruitersHomePage.show');
    }
    // Show company profile info
    public function showProfile(){
        $profile_data = Recruiters::where('userId', Auth::user()->id)->first();
        return view('recruiters.profile')->with('Profile', $profile_data);
    }

}
