<?php

namespace App\Http\Controllers;

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
            'job_id' => $request->job_id
        ]);
        
        return redirect()->back()->with('success', 'Application submitted successfully.');
    }

    // protected function create(array $data)
    // {
    //     //dd($data);
    //     return Application::create([
    //         'fname' => $data['fname'],
    //         'lname' => $data['lname'],
    //         'email' => $data['email'],
    //         'role_id'=>$data['role'],
    //         'phone_number'=>$data['phone_number'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
}