<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\jobseekers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobseekerController extends Controller
{
    public function myprofile()
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

        return view('index');

    }

    public function showProfile()
    {
        $profile_data = jobseekers::where('userId', Auth::user()->id)->first();
        return view('jobseeker.viewprofile')->with('Profile', $profile_data);
    }

    public function viewProfile()
    {
        $data = DB::table('jobseekers')->where('userId', Auth::user()->id)->first();
        // dd($data);
        return view('jobseeker.viewprofile')->with('profile_data', $data);

    }


    public function filterJobs(Request $request)
    {
        $query = JobPost::query();

        // Apply filters
        // if ($request->has('job_title')) {
        //     $query->where('job_title', $request->input('job_title'));
        // }

        // if ($request->has('position_title')) {
        //     $query->where('position_title', '<=', $request->input('position_title'));
        // }

        // if ($request->has('organisation')) {
        //     $query->where('organisation', '<=', $request->input('organisation'));
        // }

        // if ($request->has('type')) {
        //     $query->where('type', '<=', $request->input('type'));
        // }

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