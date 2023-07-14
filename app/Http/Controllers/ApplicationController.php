<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Application;
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
            'userId' => Auth::user()->id,
        ]);
        
        return redirect()->back()->with('success', 'Application submitted successfully.');
    }

}