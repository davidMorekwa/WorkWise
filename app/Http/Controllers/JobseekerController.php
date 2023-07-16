<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\jobseekers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\SourceModel;
use App\Models\DestinationModel;
use App\Models\Recruiters;

class JobseekerController extends Controller
{
    // view applied jobs
    public function viewAppliedJobs()
    {
        $data = DB::table('applications')->where('userId', Auth::user()->id);
        return view('jobseeker.appliedjobs')->with('applied', $data);
    }

    // Show open job posts
    public function viewJobPost()
    {
        $organizations = JobPost::where('status', 1)->paginate(6);
        return view('index', compact('organizations'));
    }

    // Show a particular job post
    public function viewSpecificJob($id){
        $job = JobPost::findorFail($id);
        $org = Recruiters::findorFail($job->organisation);
        $similarJobs = JobPost::where('type', $job->type)->where('id', '!=', $id)->limit(5)->get();
        return view('jobseeker.jobPost')
            ->with('job', $job)
            ->with('organisation', $org)
            ->with('similar_jobs', $similarJobs);

    }

    // view profile
    public function viewProfile()
    {
        $data = DB::table('jobseekers')->where('userId', Auth::user()->id)->first();
        // dd($data);
        return view('jobseeker.viewprofile')->with('profile_data', $data);

    }


    // filter jobs
    public function filterJobs(Request $request)
    {
        $query = JobPost::query();

        // Apply filters
        if ($request->has('filters')) {
            $filters = explode(',', $request->input('filters'));

            foreach ($filters as $filter) {
                $query->orWhere('type', 'like', '%' . $filter . '%')
                    ->orWhere('organisation', 'like', '%' . $filter . '%')
                    ->orWhere('position_title', 'like', '%' . $filter . '%')
                    ->orWhere('job_title', 'like', '%' . $filter . '%');
            }
        }

        $filters = $query->get();

        return view('filterindex', compact('filters'));
    }
}