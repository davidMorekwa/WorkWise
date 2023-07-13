<?php

namespace App\Console\Commands;

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
    protected $signature = 'app:export-data-command {jobId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //     $userId = Auth::user()->id;
        //     $org = Recruiters::where('userId', $userId)->first();
        $job_id = $this->argument('jobId');
        $data = DB::table('job_posts')->where('id', $job_id)->first(); // Replace 'your_table' with the actual table name

        $fileContents = '';
        $fileContents = $data->job_title . "\n" . $data->position_title . "\n" . $data->type . "\n" . $data->overview . "\n" . $data->responsibilities . "\n" . $data->qualifications . "\n";

        $filePath = '/Users/dave/WorkWise/WorkWise/storage/app/public/job_posts/jobPost.md'; // Define the path to your desired output file
        // Save the file
        File::put($filePath, $fileContents);
        $this->info('Data exported successfully!');
    }
}
