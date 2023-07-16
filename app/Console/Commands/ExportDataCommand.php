<?php

namespace App\Console\Commands;

use App\Models\JobPost;
use App\Models\jobseekers;
use App\Models\Recruiters;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ExportDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-data-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exports data from jobPosts and save them onto a file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //     $userId = Auth::user()->id;
        //     $org = Recruiters::where('userId', $userId)->first();
        $jobs = JobPost::all();
        $fileContents = '';
        foreach ($jobs as $data) {
            $fileContents = $data->job_title . "\n" . $data->position_title . "\n" . $data->type . "\n" . $data->overview . "\n" . $data->responsibilities . "\n" . $data->qualifications . "\n";
            $filePath = '/Users/dave/WorkWise/WorkWise/storage/app/public/job_posts/'.$data->job_title.'.md'; // Define the path to your desired output file
            // Save the file
            File::put($filePath, $fileContents);
        }
        // $filePath = '/Users/dave/WorkWise/WorkWise/storage/app/public/job_posts/jobPost.md'; // Define the path to your desired output file
        // // Save the file
        // File::put($filePath, $fileContents);
        $this->info('Data exported successfully!');
    }
}
