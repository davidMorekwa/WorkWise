<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\jobseekers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\SourceModel;
use App\Models\DestinationModel;
use App\Models\Recruiters;
use Symfony\Component\VarDumper\VarDumper;

class JobseekerController extends Controller
{

    public function myProfile()
    {
        return view('jobseeker.createprofile');
    }
    
    public function createProfile(Request $request)
    {
        $education = "High School: " . $request->sec_edu . ". University: " . $request->uni_edu . ". Masters: " . $request->masters_edu . ".";
        // dd($request);
        // $resumePath = $request->file('cv')->store('resumes', 'public');
        // echo $resumePath;
        // dd($request);
        jobseekers::create([
            'date_of_birth' => $request->dob,
            'education' => $education,
            'skills' => $request->skills,
            'achievements' => $request->achievements,
            'certifications' => $request->Certification,
            'hobbies' => $request->interests,
            'self_desription' => $request->self_description,
            'experience' => $request->work_experience,
            'userId' => Auth::user()->id,
            'field' => $request->industry,
        ]);
        return redirect()->route('/home');
    }


    // view applied jobs
    public function viewAppliedJobs()
    {
        $data = DB::table('applications')->where('userId', Auth::user()->id);
        return view('jobseeker.appliedjobs')->with('applied', $data);
    }

    // Show open job posts
    public function viewJobPost()
    {
        if (Auth::user() && Auth::user()->role_id == 3) {
            $data = array();
            $eng = new engine;
            $jobs = $eng->computeTfIdf();
            if ($jobs == 0) {
            }
            foreach ($jobs as $job) {
                $j = JobPost::where('job_title', $job)->first();
                array_push($data, $j);
            }
            $perPage = 6;
            $page = request()->query('page', 1);
            $offset = ($page - 1) * $perPage;
            $items = array_slice($data, $offset, $perPage);
            $collection = new Collection($items);
            $organizations = new LengthAwarePaginator(
                $collection,
                count($data),
                $perPage,
                $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        } else {
            $organizations = JobPost::where('status', 1)->paginate(6);
        }
        // $organizations = JobPost::where('status', 1)->paginate(6);
        return view('index', compact('organizations'));
    }

    // Show a particular job post
    public function viewSpecificJob($id)
    {
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
