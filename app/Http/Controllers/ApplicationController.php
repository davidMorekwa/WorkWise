<?php

namespace App\Http\Controllers;

use App\Mail\rejectionEmail;
use Auth;
use App\Http\Controllers\RecruitersController;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\JobPost;
use App\Models\Recruiters;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'resume' => 'required|file|mimes:pdf|max:2048',
        // ]);

        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Perform any additional actions or notifications as needed

        // return redirect()->back()->with('success', 'Application submitted successfully.');

        Application::create([
            'resume' => $resumePath,
            'job_id' => $request->job_id,
            'user_id' => Auth::user()->id,
        ]);
        
        return redirect()->back()->with('success', 'Application submitted successfully.');
    }
    function rejectApplicant(Request $request){
        $application = Application::where('id', $request->application_id)->first();
        $jobId = $application->job_id;
        $jobTitle = JobPost::where('id', $jobId)->first('job_title');
        echo "JT".$jobTitle;
        $candidate = User::where('id', $application->user_id)->first(['fname', 'email']);
        echo "CN".$candidate;
        $recruiter = Recruiters::where('userId', Auth::user()->id)->first(['organisation_name', 'email']);
        echo "RN".$recruiter;
        $rejectEmail = new rejectionEmail($jobTitle->job_title, $candidate->fname, $candidate->email, $recruiter->organisation_name, $recruiter->email);
        // var_dump($rejectEmail);
        Mail::send($rejectEmail);
        $application->delete();
        $resumes = Application::where('job_id', $jobId)->get();
        $job = JobPost::where('id', $jobId)->first('job_title');
    }
}