<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\jobseekers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\SourceModel;
use App\Models\DestinationModel;

class JobseekerController extends Controller
{
    // view applied jobs
    public function viewAppliedJobs()
    {
        $sourceData = SourceModel::find(); // Fetch the data from the source table using the ID

        // Create a new entry in the destination table and associate it with the source data
        $destinationData = new DestinationModel([
            'job_title' => $sourceData->job_title,
            'type' => $sourceData->type,
            // Include other columns as needed
        ]);
        $destinationData->sourceModel()->associate($sourceData); // Associate the source model using the ID
        $destinationData->save();
        $data = DB::table('applications')->where('userId', Auth::user()->id);
        return view('jobseeker.appliedjobs')->with('applied', $data);
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