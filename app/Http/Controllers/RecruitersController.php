<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
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
    public function registration()
    {
        return view('recruiters.register');
    }
    // Create profile data
    public function createProfile(Request $request)
    {
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
    public function showProfile()
    {
        $profile_data = Recruiters::where('userId', Auth::user()->id)->first();
        return view('recruiters.profile')->with('Profile', $profile_data);
    }
    // Show update profile form
    public function updateProfileForm()
    {
        // return view()
    }

    // Show job post form
    public function postAJob()
    {
        return view('recruiters.postAJob');
    }
    // Create a Job Post
    public function createAJobPost(Request $request)
    {
        // dd($request);
        $organisation = Recruiters::where('userId', Auth::user()->id)->first('id');
        JobPost::create([
            'job_title' => $request->job_title,
            'position_title' => $request->position_title,
            'overview' => $request->job_overview,
            'responsibilities' => $request->responsibilities,
            'type' => $request->job_type,
            'qualifications' => $request->qualifications,
            'status' => false,
            'organisation' => $organisation->id
        ]);
        return redirect()->route('RecruitersHomePage.show');
    }
    // Show recent job posts
    public function recentJobPosts()
    {
        $organisation = Recruiters::where('userId', Auth::user()->id)->first();
        $openJobs = JobPost::where('organisation', $organisation->id)->where('status', 1)->get();
        $closedJobs = JobPost::where('organisation', $organisation->id)->where('status', 0)->get();
        return view('recruiters.jobPosts')->with('openJobs', $openJobs)->with('organisation', $organisation->organisation_name)->with('closedJobs', $closedJobs);
    }
    // CLose Job Post
    public function closeJobPost(Request $request)
    {
        //dd($request);
        $post = JobPost::find($request->post_id);
        $post->status = 0;
        $post->save();
        return redirect()->route('jobPosts.show');
    }
}
