<?php

namespace App\Http\Controllers;

use App\Console\Commands\ExportDataCommand;
use App\Http\Controllers\engine;
use App\Models\Application;
use App\Models\JobPost;
use App\Models\Recruiters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $organisation = Recruiters::where('userId', Auth::user()->id)->first();
        $openJobs = JobPost::where('organisation', $organisation->id)->where('status', 1)->limit(2)->get();
        return view('recruiters.profile')->with('Profile', $profile_data)->with('openJobs', $openJobs);
    }
    // Show update profile form
    public function updateProfileForm()
    {
        $profile_data = Recruiters::where('userId', Auth::user()->id)->first();
        return view('recruiters.updateProfile')->with('profile', $profile_data);
    }
    // Update recrutier profile
    public function updateProfile(Request $request)
    {
        $profile_data = Recruiters::where('userId', Auth::user()->id)->first();
        $profile_data->organisation_name = $request->organisation_name;
        $profile_data->website = $request->website;
        $profile_data->email = $request->email;
        $profile_data->about = $request->aboutUs;
        $profile_data->location = $request->country;
        $profile_data->industry = $request->industry;
        $profile_data->save();
        return redirect()->route('RecruiterProfile.show');
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
        // return $request;
        JobPost::create([
            'job_title' => $request->job_title,
            'position_title' => $request->position_title,
            'overview' => $request->txt_job_overview,
            'responsibilities' => $request->txt_responsibilities,
            'type' => $request->job_type,//internship/ fulltime
            'qualifications' => $request->txt_qualifications,
            'status' => false,
            'organisation' => $organisation->id
        ]);
        return redirect()->route('RecruitersHomePage.show');
    }
    // View job post
    

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
        $post->delete();
        return redirect()->route('jobPosts.show');
    }
    // Show reviewResumes page
    public function showReviewResumes(){
        $organisation = Recruiters::where('userId', Auth::user()->id)->first();
        $jobs = JobPost::where('organisation', $organisation->id)->where('status', 1)->get();
        return view('recruiters.reviewResumes')->with('jobs', $jobs);
    }
    // Show list of applicants
    function tempReviewResume($jobId){
        // Artisan::call('app:export-data-command',['jobId'=>$jobId]);
        $resumes = Application::where('job_id', $jobId)->get();
        // $eng = new engine($resumes);
        $job = JobPost::where('id', $jobId)->first('job_title');
        // $eng->computeTfIdf($resumes);
        return view('recruiters.resumeView')->with('resumes', $resumes)->with('job_title', $job);
    }
    
}