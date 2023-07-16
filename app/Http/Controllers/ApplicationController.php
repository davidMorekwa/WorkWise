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
        $resumePath = $request->file('resume')->store('resumes', 'public');
        Application::create([
            'resume' => $resumePath,
            'job_id' => $request->job_id,
            // 'userId' => Auth::user()->id,
        ]);
        $message = "Function";
        // return redirect()->back()->with('success', 'Application submitted successfully.');
        return view('popup', compact('message'));
    }

}