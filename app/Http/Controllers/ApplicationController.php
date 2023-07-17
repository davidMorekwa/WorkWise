<?php

namespace App\Http\Controllers;

use App\Mail\rejectionEmail;
use Auth;
use App\Http\Controllers\RecruitersController;
use App\Mail\applicationReceivedEmail;
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
        $resumePath = $request->file('resume')->store('resumes', 'public');
        Application::create([
            'resume' => $resumePath,
            'job_id' => $request->job_id,
            'user_id' => Auth::user()->id,
        ]);
        $job = JobPost::where('id', $request->job_id)->first();
        $job_title = $job->job_title;
        $candidate_name = Auth::user()->fname;
        $candidate_email = Auth::user()->email;
        $org = Recruiters::where('id', $job->organisation)->first('organisation_name', 'email');
        $this->applicationReceived($candidate_name, $candidate_email, $org->organisation_name, $org->email, $job_title);

        //         return redirect()->back()->with('success', 'Application submitted successfully.');

        // 'userId' => Auth::user()->id,
//         ]);
        $message = "Function";
        // return redirect()->back()->with('success', 'Application submitted successfully.');
        return view('popup', compact('message'));
        //   ]);

    }
    public function applicationReceived($candidate_name, $candidate_email, $org_name, $org_email, $job_title)
    {
        $email = new applicationReceivedEmail($job_title, $candidate_name, $candidate_email, $org_name, $org_email);
        Mail::send($email);
    }
    function rejectApplicant(Request $request)
    {
        $application = Application::where('id', $request->application_id)->first();
        $jobId = $application->job_id;
        $jobTitle = JobPost::where('id', $jobId)->first('job_title');
        // echo "JT".$jobTitle;
        $candidate = User::where('id', $application->user_id)->first(['fname', 'email']);
        // echo "CN".$candidate;
        $recruiter = Recruiters::where('userId', Auth::user()->id)->first(['organisation_name', 'email']);
        // echo "RN".$recruiter;
        $rejectEmail = new rejectionEmail($jobTitle->job_title, $candidate->fname, $candidate->email, $recruiter->organisation_name, $recruiter->email);
        Mail::send($rejectEmail);
        $application->delete();
    }

    public function viewApplications()
    {
        $applications = Application::where('user_id', Auth::user()->id)->get();
        return view('jobseeker.appliedjobs', compact('applications'));
    }
}